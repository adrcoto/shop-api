<?php


use App\ItemsImage;
use App\User;
use Illuminate\Database\Seeder;
use App\Vehicle;
use App\Electronic;
use App\ItemsType;
use App\Category;
use App\SubCategory;
use App\Item;


/**
 * Class ItemsSeeder
 */
class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

       $images = [
           'images/cayenne/cayenne.png',
           'images/cayenne/cayenne1.jpg',
           'images/cayenne/cayenne2.jpg',
       ];


       sleep(3);
       $this->addVehicleItem(
           'Porsche Cayenne 2012',
           "Tot ce-i trebuie, full option",
           75000,
           true,
           Category::AUTO_MOTO_NAUTICA,
           "Craiova",
           $images,
           SubCategory::AUTOTURISME,
           ItemsType::AUTOTURISM,
           "Porsche",
           "Cayenne",
           2012,
           3000,
           325,
           "Automata - PDK",
           "SUV",
           "Diesel",
           55000,
           "4x4",
           "Euro VI",
           "Negru",
           "Romania",
           "HGJLO34810LKJF195",
           true,
           true,
           false,
           true,
           false);


       $images = [
           'images/s10/1.jpg',
           'images/s10/2.jpg',
           'images/s10/3.jpg',
           'images/s10/4.jpg',
           'images/s10/5.jpg',
           'images/s10/6.jpg',
       ];

       sleep(2);
       //telefon
       $this->addElectronicItem('Samsung Galaxy S10', "E furat din UK",
           3600, false, Category::ELECTONICE_ELECTROCASNICE, "Bals",
           $images,
           SubCategory::TELEFOANE,
           ItemsType::TELEFOANE_MOBILE,
           "Samsung", "Galaxy S10", 2018,
           false);

       $images = [
           'images/s9+/1.jpg',
           'images/s9+/2.jpg',
           'images/s9+/3.jpeg',
       ];
       sleep(1);
       //telefon
       $this->addElectronicItem('Samsung Galaxy S9+', "E furat din UK",
           2500, false, Category::ELECTONICE_ELECTROCASNICE, "Bucuresti",
           $images,
           SubCategory::TELEFOANE,
           ItemsType::TELEFOANE_MOBILE,
           "Samsung", "Galaxy S9+", 2017,
           true);


       $images = [
           'images/congelator arctic/1.jpg',
           'images/congelator arctic/2.jpg',
           'images/congelator arctic/3.jpg',
       ];
       sleep(2);
       //congelator
       $this->addElectronicItem('Congelator 5 sertare arctic',
           "Vând congelator 5 sertare arctic stare foarte bună de funcționare curat și complet",
           3600, false, Category::ELECTONICE_ELECTROCASNICE, "Constanta",
           $images,
           SubCategory::ELECTROCASNICE,
           ItemsType::APARATE_FRIGORIFICE,
           "Artic", "", 0,
           false);

       $images = [
           'images/nikon/1.jpg',
           'images/nikon/2.jpg',
           'images/nikon/3.jpg',
           'images/nikon/4.jpg',
           'images/nikon/5.jpg',
           'images/nikon/6.jpg',
           'images/nikon/7.jpg',
       ];
       sleep(1);

       $this->addElectronicItem('Nikon D7100 + 2 obiective',
           "Nikon folosit in regim hobby.
Vand Nikon D7.100 plus diverse accesorii in stare perfecta de functionare compus din:
body Nikon 7.100
Sigma 17-50 mm DSLR F2.8 EX HSM OS Montura Nikon DX
Nikkor 35 mm f/1.8
Se vinde cu toate accesoriile originale: curea, 2 baterii, incarcator si capac frontal.
Nu se vinde separat
Pret 3.200 lei
Aparatul se poate vedea in Miercurea Ciuc. Accept orice test.Predare personala in Miercurea Ciuc.
Trimit si in tara cu verificare colet.",
           3200, false, Category::ELECTONICE_ELECTROCASNICE, "Bucuresti",
           $images,
           SubCategory::TV_AUDIO_FOTO_VIDEO,
           ItemsType::APARATE_FOTO_SI_ACCESORII,
           "Nikon", "", 2017,
           true);

       $images = [
           'images/zte/1.jpg',
           'images/zte/2.jpg',
           'images/zte/3.jpg',
       ];
       sleep(3);
       //dezmembrare wot is this
       $this->addElectronicItem('Dezmembrez Zte Grand X In',
           "Dezmembrez Zte Grand X In

Placa de baza -80 Lei
Baterie-30 Lei
Capac baterie-25Lei
Rama-25 Lei
Camera spate-20 Lei

Garantie
Montaj 30 lei
Transport 25 lei
Suntem firma, nu negociem pretul si nu acceptam schimburi!!",
           50, false, Category::ELECTONICE_ELECTROCASNICE, "Craiova",
           $images,
           SubCategory::TELEFOANE,
           ItemsType::ACCESORII_GSM,
           "", "", 0,
           true);

       $images = [
           'images/husa/1.jpg',
           'images/husa/2.jpg',
           'images/husa/3.jpg',
           'images/husa/4.jpg',
           'images/husa/5.jpg',
           'images/husa/6.jpg',
           'images/husa/7.jpg',
           'images/husa/8.jpg',
       ];
       sleep(1);
//husa
       $this->addElectronicItem('Set husa slim transparenta TPU + folie sticla Hoco iPhone X',
           'COD PRODUS: IPHONE X - HOCO SET HUSA + FOLIE
           Marca HOCO este un brand international de renume, care creaza huse de top de foarte buna calitate. Aceasta husa este realizata din material TPU premium importat din Germania si produs in Hong Kong',
           89, false, Category::ELECTONICE_ELECTROCASNICE, "Craiova",
           $images,
           SubCategory::TELEFOANE,
           ItemsType::ACCESORII_GSM,
           "", "", 0,
           false);

       $images = [
           'images/dacia1310/1.jpg',
           'images/dacia1310/2.jpg',
       ];
       sleep(2);
       //dacia 1310
       $this->addVehicleItem('Dacia 1310 cu I.T.P. valabil pentru tichet rabla 2019', "Merge ca atunci cand am luat-o",
           1800, false, Category::AUTO_MOTO_NAUTICA, "Craiova",
           $images,
           SubCategory::AUTOTURISME,
           ItemsType::AUTOTURISM,
           "Dacia", "1310", 1990,
           1.2, 65, "Manuala",
           "Berlina", "Benzina", 350000,
           "Fata", "Euro", "Galben", "Romania",
           "HGJLO348HHHKJF195", true, false, true,
           false, false);

       $images = [
           'images/rama/1.jpg',
       ];
       sleep(2);
       //rama allview
       $this->addElectronicItem('Rama mijloc allview x4 soul mini',
           "Rama mijloc allview x4 soul mini Montaj 30 lei Transport in tara 20lei",
           30, false, Category::ELECTONICE_ELECTROCASNICE, "Craiova",
           $images,
           SubCategory::TELEFOANE,
           ItemsType::ACCESORII_GSM,
           "Allview", "X4 Soul Mini", 0,
           false);

        $images=[
            'images/ford focus/1.jpg',
            'images/ford focus/2.jpg',
            'images/ford focus/3.jpg',
            'images/ford focus/4.jpg',
            'images/ford focus/5.jpg',
            'images/ford focus/6.jpg',
            'images/ford focus/7.jpg',
        ];
        sleep(2);
        //ford focus
        $this->addVehicleItem('Ford Focus 2013', "ABS
CD
Geamuri fata electrice
Servodirectie
Bare longitudinale acoperis cromate
Faruri automate
Geamuri laterale spate fumurii
Incalzire auxiliara
Jante din aliaj usor
Oglinda retrovizoare interioara electrocromatica
Oglinzi retrovizoare incalzite
Proiectoare ceata
Stergatoare parbriz automate
Airbag-uri frontale
Computer de bord
Inchidere centralizata
Aer conditionat doua zone
Bluetooth
Faruri Xenon
Geamuri spate electrice
Interior din velur
Limitator de viteza
Oglinzi retrovizoare ajustabile electric
Parbriz incalzit
Scaune fata incalzite
Controlul tractiunii (ASR)
Airbag-uri laterale fata
Controlul stabilitatii (ESP)
Radio
Airbag-uri laterale spate
Comenzi volan
Geamuri cu tenta
Head-up display
Intrare auxiliara
Lumini de zi (LED)
Oglinzi retrovizoare exterioare electrocromatice
Pilot automat
Senzori parcare fata-spate",
            8600, true, Category::AUTO_MOTO_NAUTICA, "Sintesti, Bucuresti-Ilfov",
            $images,
            SubCategory::AUTOTURISME,
            ItemsType::AUTOTURISM,
            "Ford", "Focus MK3", 1990,
            1997, 163, "Automata",
            "Break", "Diesel", 105000,
            "Fata", "Euro 5", "Negru", "Germania",
            "HGJLO348LFVKJF195", true, true, false,
            true, false);
    }


    private function addItem($title, $description, $price, $currency, $category, $location, $images)
    {
        $item = new Item();

        $item->title = $title;
        $item->description = $description;
        $item->price = $price;
        $item->currency = $currency;
        $item->category = $category;
        $item->location = $location;
        $item->status = Item::STATUS_ACTIVE;
        $user = User::orderByRaw("RAND()")->first();
        $item->owner = $user->id;

        $item->save();

        if (isset($images))
            foreach ($images as $image) {
                ItemsImage::create([
                    'item_id' => $item->item_id,
                    'filename' => $image
                ]);
            }


        return $item->item_id;
    }


    private function addVehicleItem($title, $description, $price, $currency, $category, $location, $images, $sub_category, $type, $manufacturer, $model, $manufacturer_year, $engine, $power, $gearbox,
                                    $body, $fuel_type, $mileage, $drive, $emission_class, $color, $origin, $VIN,
                                    $used, $pollution_tax, $damaged, $first_owner, $right_hand_drive)
    {

        $vehicle = new Vehicle();

        $vehicle->item_id = $this->addItem($title, $description, $price, $currency, $category, $location, $images);
        $vehicle->sub_category = $sub_category;
        $vehicle->item_type = $type;

        $vehicle->manufacturer = $manufacturer;
        $vehicle->model = $model;
        $vehicle->manufacturer_year = $manufacturer_year;
        $vehicle->engine = $engine;
        $vehicle->power = $power;
        $vehicle->gearbox = $gearbox;
        $vehicle->body = $body;
        $vehicle->fuel_type = $fuel_type;
        $vehicle->mileage = $mileage;

        $vehicle->drive = $drive;
        $vehicle->emission_class = $emission_class;
        $vehicle->color = $color;
        $vehicle->origin = $origin;
        $vehicle->VIN = $VIN;

        $vehicle->used = $used;
        $vehicle->pollution_tax = $pollution_tax;
        $vehicle->damaged = $damaged;
        $vehicle->first_owner = $first_owner;
        $vehicle->right_hand_drive = $right_hand_drive;

        $vehicle->save();
    }

    private function addElectronicItem($title, $description, $price, $currency, $category, $location, $images, $sub_category, $type, $manufacturer, $model, $manufacturer_year, $used)
    {
        $electronic = new Electronic();

        $electronic->item_id = $this->addItem($title, $description, $price, $currency, $category, $location, $images);
        $electronic->sub_category = $sub_category;
        $electronic->item_type = $type;
        $electronic->manufacturer = $manufacturer;
        $electronic->model = $model;
        $electronic->manufacturer_year = $manufacturer_year;
        $electronic->used = $used;

        $electronic->save();
    }


}

