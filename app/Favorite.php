<?php


namespace App;
use Illuminate\Database\Eloquent\Model;


class Favorite extends Model {
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

}