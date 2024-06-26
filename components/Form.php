<?php namespace Pensoft\GetInvolved\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Mail;
use October\Rain\Support\Facades\Flash;
use Pensoft\GetInvolved\Models\Data;
use Pensoft\GetInvolved\Models\Interest;
use Pensoft\GetInvolved\Models\Data as MailsData;
use Pensoft\GetInvolved\Models\Recipient;
use Multiwebinc\Recaptcha\Validators\RecaptchaValidator;
use RainLab\Location\Models\Country;
use Cms\Classes\Theme;

/**
 * Form Component
 */

class Form extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Form Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'recaptcha_key' => [
                'title' => 'Recaptcha site key',
                'type' => 'string',
                'default' => ''
            ],
            'message_label' => [
                'title' => 'Thank you message',
                'type' => 'string',
                'default' => 'Thank you for contacting us!'
            ],
        ];
    }

    public function onRun() {
        $this->page['countries'] = $this->countries();
        $this->page['interests'] = $this->interests();
        $this->page['themeName'] = Theme::getActiveTheme()->getConfig()['name'];
    }

    public function countries() {
        return Country::orderBy('name')->get();
    }


    public function interests() {
        return Interest::orderBy('id')->get();
    }

    public function onSubmit(){

        $name = \Input::get('name');
        $email = \Input::get('email');
        $affiliation = \Input::get('affiliation');
        $country = \Input::get('country');
        $main_language = \Input::get('main_language');
        $second_language = \Input::get('second_language');
        $interest = \Input::get('interest');
        $agree = \Input::get('agree');


        $validator = \Validator::make(
            [
                'name' => $name,
                'email' => $email,
                'affiliation' => $affiliation,
                'country' => $country,
                'main_language' => $main_language,
                'second_language' => $second_language,
                'interest' => $interest,
                'agree' => $agree,
//                'g-recaptcha-response' => \Input::get('g-recaptcha-response'),
            ],
            [
                'name' => 'required|string|min:2',
                'email' => 'required|min:6|email',
                'affiliation' => 'required|string|min:2',
                'country' => 'required',
                'main_language' => 'required|string|min:2',
                'second_language' => 'required|string|min:2',
                'interest' => 'required',
                'agree' => 'required',
//                'g-recaptcha-response' => [
//                    'required',
//                    new RecaptchaValidator,
//                ],
            ]
        );

        $errArray = [
            "agree" => "Please check the \"I agree with the " . Theme::getActiveTheme()->getConfig()['name'] . " privacy policy\" field.",
        ];


        if($validator->fails()){
            foreach ($validator->messages()->toArray() as $k => $e){
                if(isset($errArray[$k])){
                    Flash::error($errArray[$k]);
                }else{
                    Flash::error($validator->messages()->first());
                }
                return ['scroll_to_field' => $validator->messages()->toArray()];
            }
        }else{
            $recipientsData = Recipient::first()->toArray();
            $recipientsEmails = explode(',', $recipientsData['emails']);
            $recipients = array_unique($recipientsEmails);

            // These variables are available inside the message as Twig
            $vars = [
                'name' => $name,
                'email' => $email,
                'affiliation' => $affiliation,
                'country' => $this->getCountryName($country),
                'main_language' => $main_language,
                'second_language' => $second_language,
                'interest' => $this->getInterestName($interest),
            ];

            // send mail to user submitting the form
            Mail::send('pensoft.getinvolved::mail.autoreply', $vars, function($message) {
                $message->to(\Input::get('email'), \Input::get('name'));
            });

            $replyToMail = \Input::get('email');

            foreach($recipients as $mail){
                Mail::send('pensoft.getinvolved::mail.notification', $vars, function($message)  use ($mail, $replyToMail) {
                    $message->to(trim($mail));
                    $message->replyTo($replyToMail);
                });
            }

            $data = new MailsData();
            $data->name = $name;
            $data->email =  $email;
            $data->country = $this->getCountryName($country);
            $data->affiliation =  $affiliation;
            $data->country_id = (int)$country;
            $data->main_language = $main_language;
            $data->second_language = $second_language;
            $data->save();

            $recordID = $data->id;

            foreach ($interest as $item){
                $mailData = Data::find($recordID);
                $mailData->interest()->attach($item);
            }


            Flash::success($this->property('message_label'));

        }


    }

    private function getCountryName($id) {
        $country = Country::where('id', $id)->first()->toARray();
        if(count($country)){
            return $country['name'];
        }
        return '';
    }

    private function getInterestName($ids) {
        $interests = Interest::whereIn('id', $ids)->get()->toArray();
        $arr = [];
        if(count($interests)){
            foreach ($interests as $interest){
                $arr[] = $interest['name'];
            }
        }
        return implode(', ', $arr);
    }
}
