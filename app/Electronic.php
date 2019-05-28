<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Electronic Item
 *
 * @property integer item_id
 * @property integer sub_category
 * @property integer item_type
 *
 * @property string manufacturer
 * @property string model
 * @property string manufacturer_year
 * @property boolean used
 * @package App
 */
class Electronic extends Item
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'manufacturer',
        'model',
        'manufacturer_year',
        'used'
    ];

    public $timestamps = false;
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

    public function item()
    {
        return $this->belongsTo('App\Item');
    }





}
