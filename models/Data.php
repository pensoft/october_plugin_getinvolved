<?php namespace Pensoft\GetInvolved\Models;

use Model;
use RainLab\Location\Models\Country;

/**
 * Data Model
 */
class Data extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table associated with the model
     */
    public $table = 'pensoft_getinvolved_data';

    /**
     * @var array guarded attributes aren't mass assignable
     */
    protected $guarded = ['*'];

    /**
     * @var array fillable attributes are mass assignable
     */
    protected $fillable = [];

    /**
     * @var array rules for validation
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * @var array jsonable attribute names that are json encoded and decoded from the database
     */
//    protected $jsonable = ['interest'];

    /**
     * @var array appends attributes to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array hidden attributes removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    public $belongsTo = [
        'country' => [Country::class],
    ];

    public $belongsToMany = [
        'interest' => [
            Interest::class,
            'table' => 'pensoft_getinvolved_data_interest',
            'order' => 'name'
        ],
        'category' => [
            Category::class,
            'table' => 'pensoft_getinvolved_data_categories',
            'order' => 'name',
        ],
    ];

    /**
     * @var array hasOne and other relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}