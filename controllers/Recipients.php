<?php namespace Pensoft\GetInvolved\Controllers;

use Backend\Classes\Controller;
use Backend\Behaviors\ListController;
use Backend\Behaviors\FormController;
use BackendMenu;

class Recipients extends Controller
{
    public $implement = [
        ListController::class,
        FormController::class,
    ];

    public string $listConfig = 'config_list.yaml';
    public string $formConfig = 'config_form.yaml';

    public $requiredPermissions = ['pensoft.getinvolved.all'];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Pensoft.GetInvolved', 'getinvolved', 'side-menu-item3');
    }
}