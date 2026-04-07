<?php namespace Pensoft\GetInvolved\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Backend\Behaviors\FormController;
use Backend\Behaviors\ListController;

/**
 * Mails Backend Controller
 */
class Mails extends Controller
{
    public $implement = [
        FormController::class,
        ListController::class,
    ];

    /**
     * @var string formConfig file
     */
    public string $formConfig = 'config_form.yaml';

    /**
     * @var string listConfig file
     */
    public string $listConfig = 'config_list.yaml';

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