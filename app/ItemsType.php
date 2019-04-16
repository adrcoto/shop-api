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
        ['category' => Category::ELECTONICE_ELECTROCASNICE, 'sub_category' => SubCategory::ECHIPAMENTE_DE_BIROU, 'name' => 'Telefoane fixe - Faxuri-centrale'],
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
        ['category' => Category::AUTO_MOTO_NAUTICA, 'sub_category' => SubCategory::PIESE_ACCESORII_CONSUMABILE, 'name' => 'Accesorii auto'],
        ['category' => Category::AUTO_MOTO_NAUTICA, 'sub_category' => SubCategory::PIESE_ACCESORII_CONSUMABILE, 'name' => 'Consumabile'],

        ['category' => Category::AUTO_MOTO_NAUTICA, 'sub_category' => SubCategory::JANTE_ANVELOPE, 'name' => 'Jante'],
        ['category' => Category::AUTO_MOTO_NAUTICA, 'sub_category' => SubCategory::JANTE_ANVELOPE, 'name' => 'Anvelope'],
    ];




    const LAPTOP = 1;
    const SISTEME_PC = 2;
    const MONITOARE = 3;
    const MOUSE_TASTATURI = 4;
    const MODEMURI_ROUTERE = 5;
    const COMPONENTE_ACCESORII = 6;

    const TELEFOANE_MOBILE = 7;
    const ACCESORII_GSM = 8;

    const TABLETE = 9;
    const eREADER = 10;
    const GADGETURI = 11;


    const TELEVIZOARE_ACCESORII = 12;
    const BOXE_SISTEME_AUDIO = 13;
    const PLAYERE_AUDIO_VIDEO = 14;
    const APARATE_FOTO_SI_ACCESORII = 15;
    const CAMERE_VIDEO_SI_ACCESORII = 16;
    const MIXER_AMPLIFICATOR_RECEIVER = 17;

    const JOCURI = 18;
    const CONSOLE = 19;
    const ACCESORII_CONSOLE = 20;

    const APARAT_DE_BUCATARIE = 21;
    const ARAGAZURI_CUPTOARE_PLITE_SI_HOTE = 22;
    const APARATE_FRIGORIFICE = 23;
    const MASINI_DE_CUSUT = 24;
    const MASINI_DE_SPALAT = 25;
    const ELECTROCASNICE_MICI = 26;
    const ALTE_APARATE_ELECTRICE = 27;

    const IMPRIMATE_COPIATOARE_SCANNERE = 28;
    const TELEFOANE_FIXE_FAXURI_CENTRALE = 29;
    const ALTE_ECHIPAMENTE_DE_BIROU = 30;
    const PAPETARIE = 31;

    const AUTOTURISM = 32;
    const MOTOCICLETA = 33;
    const ATV = 34;
    const SCOOTER = 35;

    const AUTOUTILITARE = 36;
    const CAMIOANE = 37;
    const REMORCI = 38;
    const RULOTE_CARAVANE = 39;
    const BARCI = 40;

    const PIESE_AUTO = 41;
    const PIESE_MOTO = 42;
    const ACCESORII_AUTO = 43;
    const CONSUMABILE = 44;

    const JANTE = 45;
    const ANVELOPE = 46;

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
