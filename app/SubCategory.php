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

    /**
     * Usefull constants
     */
    const LAPTOP_PC_PERIFERICE = 1;
    const TELEFOANE = 2;
    const TABLETE_EREADERE_GADGETURI = 3;
    const TV_AUDIO_FOTO_VIDEO = 4;
    const JOCURI_CONSOLE = 5;
    const ELECTROCASNICE = 6;
    const ECHIPAMENTE_DE_BIROU = 7;

    const AUTOTURISME = 8;
    const MOTOCICLETE_ATV_SCUTERE = 9;
    const CAMIOANE_UTILITARE_BARCI = 10;
    const PIESE_ACCESORII_CONSUMABILE = 11;
    const JANTE_ANVELOPE = 12;

    const SUB_CATEGORIES = [
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'name' => 'Laptop - PC - Periferice'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'name' => 'Telefoane'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'name' => 'Tablete-eReadere-Gadgeturi'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'name' => 'TV - Audio - Foto - Video'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'name' => 'Jocuri-Console'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'name' => 'Electrocasnice'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'name' => 'Echipamente de birou'],

        ['category' => Category::AUTO_MOTO_NAUTICA, 'name' => 'Autoturisme'],
        ['category' => Category::AUTO_MOTO_NAUTICA, 'name' => 'Motociclete - ATV - Scutere'],
        ['category' => Category::AUTO_MOTO_NAUTICA, 'name' => 'Camioane-Utilitare-Barci'],
        ['category' => Category::AUTO_MOTO_NAUTICA, 'name' => 'Piese - Accesorii - Consumabile'],
        ['category' => Category::AUTO_MOTO_NAUTICA, 'name' => 'Jante-Anvelope'],
    ];




//    const GARSONIERE_DE_INCHIRIAT = 13;
//    const GARSONIERE_DE_CUMPARAT = 14;
//    const SPATII_COMERCIALE_BIROURI = 15;

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
