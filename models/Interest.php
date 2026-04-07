<?php namespace Pensoft\GetInvolved\Models;

use Model;
use October\Rain\Database\Traits\Sortable;

/**
 * Model
 */
class Interest extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    use Sortable;

    protected $casts = [
        'deleted_at' => 'datetime',
    ];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_getinvolved_interest';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}