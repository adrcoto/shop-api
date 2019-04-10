<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 *
 * @package App
 */
class Car extends Model
{
    /** @var int */
    const REGISTERED = 1;

    /** @var int */
    const UNREGISTERED = 0;

    const POLLUTION_TAX_PAID = 1;

    const POLLUTION_TAX_UNPAID = 0;

    const DAMAGED = 1;

    const UNDAMAGED = 0;

    const FIRST_OWNER = 1;

    const UNKNOWN_OWNER = 0;

    const LEFT_HAND_DRIVE = 0;

    const RIGHT_HAND_DRIVE = 1;




    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'manufacturer',
        'model',
        'body',
        'fuel_type',
        'manufacturer_year',
        'mileage',
        'status',
        'engine',
        'origin',
        'power',
        'gearbox',
        'drive',
        'emission_class',
        'color',
        'VIN',
        'pollution_tax',
        'damaged',
        'registered',
        'first_owner',
        'right_hand_drive'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * Get the user that created the task.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subcategory()
    {
        return $this->belongsTo('App\SubCategory');
    }





}
