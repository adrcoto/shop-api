<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ItemsType
 *
 * @package App
 */
class ItemsType extends Model
{

    const ITEMS_TYPES = [
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::LAPTOP_PC_PERIFERICE, 'name' => 'Laptop'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::LAPTOP_PC_PERIFERICE, 'name' => 'Sisteme PC'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::LAPTOP_PC_PERIFERICE, 'name' => 'Monitoare'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::LAPTOP_PC_PERIFERICE, 'name' => 'Mouse-Tastaturi'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::LAPTOP_PC_PERIFERICE, 'name' => 'Modemuri-Routere'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::LAPTOP_PC_PERIFERICE, 'name' => 'Componente-Accesorii'],

        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::TELEFOANE, 'name' => 'Telefoane-Mobile'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::TELEFOANE, 'name' => 'Accesorii-GSM'],

        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::TABLETE_EREADERE_GADGETURI, 'name' => 'Tablete'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::TABLETE_EREADERE_GADGETURI,'name' => 'E-reader'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::TABLETE_EREADERE_GADGETURI,'name' => 'Gadget-uri'],

        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::TV_AUDIO_FOTO_VIDEO, 'name' => 'Televizoare-Accesorii'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::TV_AUDIO_FOTO_VIDEO, 'name' => 'Boxe-Sisteme audio'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::TV_AUDIO_FOTO_VIDEO, 'name' => 'Playere audio-video'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::TV_AUDIO_FOTO_VIDEO, 'name' => 'Aparate video si accesorii'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::TV_AUDIO_FOTO_VIDEO, 'name' => 'Camere video si accesorii'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::TV_AUDIO_FOTO_VIDEO, 'name' => 'Mixer-Amplificator-Receiver'],

        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::JOCURI_CONSOLE, 'name' => 'Jocuri'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::JOCURI_CONSOLE, 'name' => 'Console'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::JOCURI_CONSOLE, 'name' => 'Accesorii'],

        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::ELECTROCASNICE, 'name' => 'Electrocasnice'],

        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::ECHIPAMENTE_DE_BIROU, 'name' => 'Imprimante-Copiatoare-Scannere'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::ECHIPAMENTE_DE_BIROU, 'name' => 'Telefoan fixe - Faxuri-centrale'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::ECHIPAMENTE_DE_BIROU, 'name' => 'Alte echipamente de birou'],
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::ECHIPAMENTE_DE_BIROU, 'name' => 'Papetarie'],

        ['category' => Category::AUTO_MOTO_NAUTICA, 'sub_category' => SubCategory::AUTOTURISME, 'name' => 'Autoturism'],

        ['category' => Category::AUTO_MOTO_NAUTICA, 'sub_category' => SubCategory::MOTOCICLETE_ATV_SCUTERE, 'name' => 'Motocicleta'],
        ['category' => Category::AUTO_MOTO_NAUTICA, 'sub_category' => SubCategory::MOTOCICLETE_ATV_SCUTERE, 'name' => 'ATV'],
        ['category' => Category::AUTO_MOTO_NAUTICA, 'sub_category' => SubCategory::MOTOCICLETE_ATV_SCUTERE, 'name' => 'Scooter'],

        ['category' => Category::AUTO_MOTO_NAUTICA, 'sub_category' => SubCategory::CAMIOANE_UTILITARE_BARCI, 'name' => 'Autoutilitare'],
        ['category' => Category::AUTO_MOTO_NAUTICA, 'sub_category' => SubCategory::CAMIOANE_UTILITARE_BARCI, 'name' => 'Camioane'],
        ['category' => Category::AUTO_MOTO_NAUTICA, 'sub_category' => SubCategory::CAMIOANE_UTILITARE_BARCI, 'name' => 'Remorci'],
        ['category' => Category::AUTO_MOTO_NAUTICA, 'sub_category' => SubCategory::CAMIOANE_UTILITARE_BARCI, 'name' => 'Rulote-Caravane'],
        ['category' => Category::AUTO_MOTO_NAUTICA, 'sub_category' => SubCategory::CAMIOANE_UTILITARE_BARCI, 'name' => 'Barci'],

        ['category' => Category::AUTO_MOTO_NAUTICA, 'sub_category' => SubCategory::PIESE_ACCESORII_CONSUMABILE, 'name' => 'Piese auto'],
        ['category' => Category::AUTO_MOTO_NAUTICA, 'sub_category' => SubCategory::PIESE_ACCESORII_CONSUMABILE, 'name' => 'Piese moto'],
        ['category' => Category::AUTO_MOTO_NAUTICA, 'sub_category' => SubCategory::PIESE_ACCESORII_CONSUMABILE, 'name' => 'Accesorii'],
        ['category' => Category::AUTO_MOTO_NAUTICA, 'sub_category' => SubCategory::PIESE_ACCESORII_CONSUMABILE, 'name' => 'Consumabile'],

        ['category' => Category::AUTO_MOTO_NAUTICA, 'sub_category' => SubCategory::JANTE_ANVELOPE, 'name' => 'Jante'],
        ['category' => Category::AUTO_MOTO_NAUTICA, 'sub_category' => SubCategory::JANTE_ANVELOPE, 'name' => 'Anvelope'],
    ];

//['category' => Category::IMOBILIARE, 'name' => 'Garsoniere de inchiriat'],
//['category' => Category::IMOBILIARE, 'name' => 'Garsoniere de cumparat'],
//['category' => Category::IMOBILIARE, 'name' => 'Spatii comerciale - Birouri']


    const ELECTONICE_ELECTROCASNICE = 1;
    const AUTO_MOTO_NAUTICA = 2;
//    const IMOBILIARE = 3;
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

    public function electronics()
    {
        return $this->belongsTo('App\Electronics');
    }

    public function vehicles()
    {
        return $this->belongsTo('App\Vehicle');
    }


}
