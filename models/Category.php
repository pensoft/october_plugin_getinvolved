<?php namespace Pensoft\GetInvolved\Models;

use Model;
use October\Rain\Database\Traits\Sortable;

/**
 * Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    use Sortable;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_getinvolved_categories';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
