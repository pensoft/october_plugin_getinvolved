<?php namespace Pensoft\GetInvolved\Controllers;

use Backend\Classes\Controller;
use Backend\Behaviors\ListController;
use Backend\Behaviors\FormController;
use Backend\Behaviors\ReorderController;
use BackendMenu;

class Categories extends Controller
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

    public function __construct()
    {
        parent::__construct();
    }
}