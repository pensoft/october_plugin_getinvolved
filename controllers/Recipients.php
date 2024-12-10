<?php namespace Pensoft\GetInvolved\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Recipients extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = ['pensoft.getinvolved.all'];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Pensoft.GetInvolved', 'getinvolved', 'side-menu-item3');
    }
}
