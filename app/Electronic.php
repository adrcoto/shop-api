<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Electronic Item
 *
 * @package App
 */
class Electronic extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'manufacturer',
        'model',
        'status',
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

    public function item()
    {
        return $this->belongsTo('App\Item');
    }





}
