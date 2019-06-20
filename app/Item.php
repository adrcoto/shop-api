<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Item

 * @property integer item_id
 * @property string title
 * @property string slug
 * @property string description
 * @property float price
 * @property boolean currency
 * @property boolean negotiable
 * @property boolean change
 * @property integer category
 * @property integer sub_category
 * @property integer item_type
 * @property string city
 * @property string $district
 * @property boolean status
 * @property integer owner
 * @package App
 */


class Item extends Model
{
    /** @var int */
    const STATUS_ACTIVE = 1;

    /** @var int */
    const STATUS_DEACTIVATED = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'title',
        'description',
        'price',
        'currency',
        'category',
        'sub_category',
        'item_type',
        'city',
        'district',
        'status',
        'owner'
    ];

    protected $primaryKey = 'item_id';

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
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /**
     * Get item images
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\ItemsImage');
    }

    public function vehicles()
    {
        return $this->hasMany('App\Vehicle');
    }

    public function electronics()
    {
        return $this->hasMany('App\Electronic');
    }
    /**
     * Get task logs
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logs()
    {
        return $this->hasMany('App\Log');
    }
}
