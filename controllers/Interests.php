<?php namespace Pensoft\GetInvolved\Controllers;

use Backend\Classes\Controller;
use Backend\Behaviors\ListController;
use Backend\Behaviors\FormController;
use Backend\Behaviors\ReorderController;
use BackendMenu;

class Interests extends Controller
{

    use \October\Rain\Database\Traits\Sortable;

    public $implement = [
        ListController::class,
        FormController::class,
        ReorderController::class,
    ];

    public string $listConfig = 'config_list.yaml';
    public string $formConfig = 'config_form.yaml';
    public string $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = ['pensoft.getinvolved.all'];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Pensoft.GetInvolved', 'getinvolved', 'side-menu-item');
    }
}