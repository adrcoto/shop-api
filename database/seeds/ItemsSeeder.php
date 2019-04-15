<?php


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


        $this->addVehicleItem('Porsche Cayenne 2012', "Tot ce-i trebuie, full option",
            750000, true, Category::AUTO_MOTO_NAUTICA, "Craiova",
            SubCategory::AUTOTURISME,
            ItemsType::AUTOTURISM,
            "Porsche", "Cayenne", 2012,
            3000, 325, "Automata - PDK",
            "SUV", "Diesel", 55000,
            "4x4", "Euro VI", "Negru", "Romania",
            "HGJLO34810LKJF195", true, true, false,
            true, false);

    //telefon
        $this->addElectronicItem('Samsung Galaxy S10', "E furat din UK",
            3600, false, Category::ELECTONICE_ELECTROCASNICE, "Bals",
            SubCategory::TELEFOANE,
            ItemsType::TELEFOANE_MOBILE,
            "Samsung", "Galaxy S10", 2018,
            false);

        //telefon
        $this->addElectronicItem('Samsung Galaxy S9+', "E furat din UK",
            2500, false, Category::ELECTONICE_ELECTROCASNICE, "Bucuresti",
            SubCategory::TELEFOANE,
            ItemsType::TELEFOANE_MOBILE,
            "Samsung", "Galaxy S9+", 2017,
            true);


        //congelator
        $this->addElectronicItem('Congelator 5 sertare artic',
            "Vând congelator 5 sertare arctic stare foarte bună de funcționare curat și complet",
            3600, false, Category::ELECTONICE_ELECTROCASNICE, "Constanta",
            SubCategory::ELECTROCASNICE,
            ItemsType::APARATE_FRIGORIFICE,
            "Artic", "", 0,
            false);


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
            SubCategory::TV_AUDIO_FOTO_VIDEO,
            ItemsType::APARATE_FOTO_SI_ACCESORII,
            "Nikon", "", 2017,
            true);

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
            SubCategory::TELEFOANE,
            ItemsType::ACCESORII_GSM,
            "", "", 0,
            true);

//husa
        $this->addElectronicItem('Set husa slim transparenta TPU + folie sticla Hoco iPhone X',
            'COD PRODUS: IPHONE X - HOCO SET HUSA + FOLIE
            Marca HOCO este un brand international de renume, care creaza huse de top de foarte buna calitate. Aceasta husa este realizata din material TPU premium importat din Germania si produs in Hong Kong',
            89, false, Category::ELECTONICE_ELECTROCASNICE, "Craiova",
            SubCategory::TELEFOANE,
            ItemsType::ACCESORII_GSM,
            "", "", 0,
            false);


        //rama allview
        $this->addElectronicItem('Rama mijloc allview x4 soul mini',
            "Rama mijloc allview x4 soul mini Montaj 30 lei Transport in tara 20lei",
            30, false, Category::ELECTONICE_ELECTROCASNICE, "Craiova",
            SubCategory::TELEFOANE,
            ItemsType::ACCESORII_GSM,
            "Allview", "X4 Soul Mini", 0,
            false);


    }


    private function addItem($title, $description, $price, $currency, $category, $location)
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

        return $item->id;
    }



//$this->addVehicle($item->id, $sub_category, $type, $manufacturer, $model, $manufacturer_year, $engine, $power, $gearbox,
//$body, $fuel_type, $mileage, $drive, $emission_class, $color, $origin, $VIN,
//$used, $pollution_tax, $damaged, $first_owner, $right_hand_drive);

    private function addVehicleItem($title, $description, $price, $currency, $category, $location, $sub_category, $type, $manufacturer, $model, $manufacturer_year, $engine, $power, $gearbox,
                                    $body, $fuel_type, $mileage, $drive, $emission_class, $color, $origin, $VIN,
                                    $used, $pollution_tax, $damaged, $first_owner, $right_hand_drive)
    {

        $vehicle = new Vehicle();

        $vehicle->item_id = $this->addItem($title, $description, $price, $currency, $category, $location);;
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

    private function addElectronicItem($title, $description, $price, $currency, $category, $location, $sub_category, $type, $manufacturer, $model, $manufacturer_year, $used)
    {
        $electronic = new Electronic();

        $electronic->item_id = $this->addItem($title, $description, $price, $currency, $category, $location);;
        $electronic->sub_category = $sub_category;
        $electronic->item_type = $type;
        $electronic->manufacturer = $manufacturer;
        $electronic->model = $model;
        $electronic->manufacturer_year = $manufacturer_year;
        $electronic->used = $used;

        $electronic->save();
    }


}

