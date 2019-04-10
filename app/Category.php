<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 *
 * @package App
 */
class Category extends Model
{

    const ELECTONICE_ELECTROCASNICE = 1;
    const AUTO_MOTO_NAUTICA = 2;
    const IMOBILIARE = 3;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
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


    /**
     * Get sub categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subCategories()
    {
        return $this->hasMany('App\SubCategory');
    }


}
