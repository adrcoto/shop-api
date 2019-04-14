<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Vehicle Item
 *
 * @property mixed mileage
 * @property mixed manufacturer_year
 * @property mixed manufacturer
 * @property mixed item
 * @property int category
 * @property int sub_category
 * @property mixed model
 * @property mixed body
 * @property mixed fuel_type
 * @property mixed status
 * @property mixed engine
 * @property mixed origin
 * @property mixed power
 * @property mixed gearbox
 * @property mixed drive
 * @property mixed emission_class
 * @property mixed color
 * @property mixed VIN
 * @property mixed pollution_tax
 * @property mixed damaged
 * @property mixed registered
 * @property mixed first_owner
 * @property mixed right_hand_drive
 * @package App
 */
class Vehicle extends Model
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


    public function item()
    {
        return $this->belongsTo('App\Item');
    }





}
