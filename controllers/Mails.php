<?php namespace Pensoft\GetInvolved\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Mails Backend Controller
 */
class Mails extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class
    ];

    /**
     * @var string formConfig file
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string listConfig file
     */
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['pensoft.getinvolved.all'];

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Pensoft.GetInvolved', 'getinvolved', 'mails');
    }
}
