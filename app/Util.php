<?php


namespace App;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Util
{
    public static function buildItems($data)
    {
        $items = new Collection();
        foreach ($data as $itemToBuild) {
            $itemBuilt = new \stdClass();
            $cat = $itemToBuild->category;

            $itemBuilt->item_id = $itemToBuild->item_id;
            $itemBuilt->title = $itemToBuild->title;
            $itemBuilt->slug = $itemToBuild->slug;
            $itemBuilt->description = $itemToBuild->description;
            $itemBuilt->price = $itemToBuild->price;
            $itemBuilt->currency = $itemToBuild->currency;
            $itemBuilt->negotiable = $itemToBuild->negotiable;
            $itemBuilt->change = $itemToBuild->change;
            $itemBuilt->category = $itemToBuild->category;
            $itemBuilt->sub_category = $itemToBuild->sub_category;
            $itemBuilt->item_type = $itemToBuild->item_type;
//            $itemBuilt->location = $itemToBuild->location;
            $itemBuilt->city = $itemToBuild->city;
            $itemBuilt->district = $itemToBuild->district;
            $itemBuilt->status = $itemToBuild->status;
            $itemBuilt->owner = $itemToBuild->owner;
            $itemBuilt->created_at = $itemToBuild->created_at;
            $itemBuilt->updated_at = $itemToBuild->updated_at;

            $itemBuilt->images = DB::table('items_images')->where('item_id', '=', $itemBuilt->item_id)->get();

            if ($cat == Category::ELECTONICE_ELECTROCASNICE) {
                $electronic = Electronic::find($itemToBuild->item_id);

                $itemBuilt->manufacturer = $electronic->manufacturer;
                $itemBuilt->model = $electronic->model;
                $itemBuilt->manufacturer_year = $electronic->manufacturer_year;
                $itemBuilt->used = $electronic->used;
            } else {
                $vehicle = Vehicle::find($itemToBuild->item_id);

                $itemBuilt->manufacturer = $vehicle->manufacturer;
                $itemBuilt->model = $vehicle->model;
                $itemBuilt->manufacturer_year = $vehicle->manufacturer_year;
                $itemBuilt->engine = $vehicle->engine;
                $itemBuilt->power = $vehicle->power;
                $itemBuilt->gearbox = $vehicle->gearbox;
                $itemBuilt->body = $vehicle->body;
                $itemBuilt->fuel_type = $vehicle->fuel_type;
                $itemBuilt->mileage = $vehicle->mileage;

                $itemBuilt->drive = $vehicle->drive;
                $itemBuilt->emission_class = $vehicle->emission_class;
                $itemBuilt->color = $vehicle->color;
                $itemBuilt->origin = $vehicle->origin;
                $itemBuilt->VIN = $vehicle->VIN;

                $itemBuilt->used = $vehicle->used;
                $itemBuilt->pollution_tax = $vehicle->pollution_tax;
                $itemBuilt->damaged = $vehicle->damaged;
                $itemBuilt->registered = $vehicle->registered;
                $itemBuilt->first_owner = $vehicle->first_owner;
                $itemBuilt->right_hand_drive = $vehicle->right_hand_drive;
            }
            $items->push($itemBuilt);
        }

        return $items;
    }
}