<?php namespace Pensoft\GetInvolved\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Interests extends Controller
{

    use \October\Rain\Database\Traits\Sortable;

    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = ['pensoft.getinvolved.all'];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Pensoft.GetInvolved', 'getinvolved', 'side-menu-item');
    }
}
