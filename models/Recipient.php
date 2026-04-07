<?php namespace Pensoft\GetInvolved\Models;

use Model;

/**
 * Model
 */
class Recipient extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $casts = [
        'deleted_at' => 'datetime',
    ];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_getinvolved_recipients';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}