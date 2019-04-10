<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SubCategory
 *
 * @package App
 */
class SubCategory extends Model
{
    const LAPTOP_PC_PERIFERICE = 1;
    const TELEFOANE = 2;
    const TV_AUDIO_FOTO_VIDEO = 3;
    const AUTOTURISME = 4;
    const MOTOCICLETE_ATV_SCUTERE = 5;
    const PIESE_ACCESORII_CONSUMABILE = 6;
    const GARSONIERE_DE_INCHIRIAT = 7;
    const GARSONIERE_DE_CUMPARAT = 8;
    const SPATII_COMERCIALE_BIROURI = 9;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category',
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
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
