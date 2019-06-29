<?php

namespace App\Http\Controllers\v1;


use App\Item;
use App\ItemsType;
use App\Role;
use App\Electronic;
use App\Vehicle;
use App\ItemsImage;
use App\Category;
use App\SubCategory;
use App\User;
use App\Util;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;

/**
 * Class ItemController
 *
 * @package App\Http\Controllers\v1
 */
class ItemController extends Controller
{


    /**
     * Get logged user's items
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Request $request)
    {
        try {
            $perPage = $request->perPage;

            $user = $this->validateSession();
            $items = Item::where('owner', $user->id)
                ->orderBy('created_at')
                ->paginate($perPage);

            if (!$items)
                return $this->returnNotFound();

            return $this->returnSuccess(['items' => Util::buildItems($items), 'total' => $items->total()]);
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }

    /**
     * Search for items
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        try {

            $perPage = $request->perPage;
            $itemsToBuild = null;

            if ($request->has('q')) {
                $itemsToBuild = Item::where('items.title', 'LIKE', '%' . $request->q . '%')
                    ->orderBy('created_at', 'desc')
                    ->paginate($perPage);

                // q + city
                if ($request->has('city')) {
                    $itemsToBuild = Item::where('items.title', 'LIKE', '%' . $request->q . '%')
                        ->where('items.city', '=', $request->city)
                        ->orderBy('created_at', 'desc')
                        ->paginate($perPage);
                    if ($request->has('district')) {
                        $itemsToBuild = Item::where('items.title', 'LIKE', '%' . $request->q . '%')
                            ->where('items.city', '=', $request->city)
                            ->where('items.district', '=', $request->district)
                            ->orderBy('created_at', 'desc')
                            ->paginate($perPage);
                        if ($request->has('category')) {
                            $itemsToBuild = Item::where('items.title', 'LIKE', '%' . $request->q . '%')
                                ->where('items.city', '=', $request->city)
                                ->where('items.district', '=', $request->district)
                                ->where('items.category', '=', $request->category)
                                ->orderBy('created_at', 'desc')
                                ->paginate($perPage);

                            if ($request->has('sub_category')) {
                                $itemsToBuild = Item::where('items.title', 'LIKE', '%' . $request->q . '%')
                                    ->where('items.city', '=', $request->city)
                                    ->where('items.district', '=', $request->district)
                                    ->where('items.category', '=', $request->category)
                                    ->where('items.sub_category', '=', $request->sub_category)
                                    ->orderBy('created_at', 'desc')
                                    ->paginate($perPage);
                            }
                        }
                    } //ends if has city
                } else if ($request->has('district')) {
                    $itemsToBuild = Item::where('items.title', 'LIKE', '%' . $request->q . '%')
                        ->where('items.district', '=', $request->district)
                        ->orderBy('created_at', 'desc')
                        ->paginate($perPage);

                    if ($request->has('category')) {
                        $itemsToBuild = Item::where('items.title', 'LIKE', '%' . $request->q . '%')
                            ->where('items.district', '=', $request->district)
                            ->where('items.category', '=', $request->category)
                            ->orderBy('created_at', 'desc')
                            ->paginate($perPage);
                        if ($request->has('sub_category')) {
                            $itemsToBuild = Item::where('items.title', 'LIKE', '%' . $request->q . '%')
                                ->where('items.district', '=', $request->district)
                                ->where('items.category', '=', $request->category)
                                ->where('items.sub_category', '=', $request->sub_category)
                                ->orderBy('created_at', 'desc')
                                ->paginate($perPage);
                        }
                    }
                } else if ($request->has('category')) {
                    $itemsToBuild = Item::where('items.title', 'LIKE', '%' . $request->q . '%')
                        ->where('items.category', '=', $request->category)
                        ->orderBy('created_at', 'desc')
                        ->paginate($perPage);

                    if ($request->has('sub_category')) {
                        $itemsToBuild = Item::where('items.title', 'LIKE', '%' . $request->q . '%')
                            ->where('items.category', '=', $request->category)
                            ->where('items.sub_category', '=', $request->sub_category)
                            ->orderBy('created_at', 'desc')
                            ->paginate($perPage);
                    }
                }
            } else if ($request->has('city')) {
                $itemsToBuild = Item::where('items.city', '=', $request->city)
                    ->orderBy('created_at', 'desc')
                    ->paginate($perPage);
                if ($request->has('district')) {
                    $itemsToBuild = Item::where('items.city', '=', $request->city)
                        ->where('items.district', '=', $request->district)
                        ->orderBy('created_at', 'desc')
                        ->paginate($perPage);
                    if ($request->has('category')) {
                        $itemsToBuild = Item::where('items.city', '=', $request->city)
                            ->where('items.district', '=', $request->district)
                            ->where('items.category', '=', $request->category)
                            ->orderBy('created_at', 'desc')
                            ->paginate($perPage);

                        if ($request->has('sub_category')) {
                            $itemsToBuild = Item::where('items.city', '=', $request->city)
                                ->where('items.district', '=', $request->district)
                                ->where('items.category', '=', $request->category)
                                ->where('items.sub_category', '=', $request->sub_category)
                                ->orderBy('created_at', 'desc')
                                ->paginate($perPage);
                        }
                    }
                } //ends if has district
                else if ($request->has('category')) {
                    $itemsToBuild = Item::where('items.city', '=', $request->city)
                        ->where('items.category', '=', $request->category)
                        ->orderBy('created_at', 'desc')
                        ->paginate($perPage);
                    if ($request->has('sub_category')) {
                        $itemsToBuild = Item::where('items.city', '=', $request->city)
                            ->where('items.category', '=', $request->category)
                            ->where('items.sub_category', '=', $request->sub_category)
                            ->orderBy('created_at', 'desc')
                            ->paginate($perPage);
                    }
                }
            } else if ($request->has('district')) {
                $itemsToBuild = Item::where('items.district', '=', $request->district)
                    ->orderBy('created_at', 'desc')
                    ->paginate($perPage);
                if ($request->has('category')) {
                    $itemsToBuild = Item::where('items.district', '=', $request->district)
                        ->where('items.category', '=', $request->category)
                        ->orderBy('created_at', 'desc')
                        ->paginate($perPage);
                    if ($request->has('sub_category')) {
                        $itemsToBuild = Item::where('items.district', '=', $request->district)
                            ->where('items.category', '=', $request->category)
                            ->where('items.sub_category', '=', $request->sub_category)
                            ->orderBy('created_at', 'desc')
                            ->paginate($perPage);
                    }
                }
            } else if ($request->has('category')) {
                $itemsToBuild = Item::where('items.category', '=', $request->category)
                    ->orderBy('created_at', 'desc')
                    ->paginate($perPage);
                if ($request->has('sub_category')) {
                    $itemsToBuild = Item::where('items.category', '=', $request->category)
                        ->where('items.sub_category', '=', $request->sub_category)
                        ->orderBy('created_at', 'desc')
                        ->paginate($perPage);
                }
            } else
                $itemsToBuild = Item::orderBy('created_at', 'desc')->paginate($perPage);


            if (!$itemsToBuild)
                return $this->returnNotFound();


            return $this->returnSuccess(['items' => Util::buildItems($itemsToBuild), 'total' => $itemsToBuild->total()]);
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }

    /**
     * Gets one item
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getItem(Request $request, $id)
    {
        try {
            $rules = [
                'slug' => 'required'
            ];

            $messages = [
                'slug.required' => 'slug',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if (!$validator->passes()) {
                return $this->returnError($validator->errors()->first());
            }

            $requestedItem = Item::where('item_id', $id)->where('slug', $request->slug)->first();

            $tempItem = new Collection();
            $tempItem->push($requestedItem);

            if (!$requestedItem)
                return $this->returnNotFound('item.404');


            $item = Util::buildItems($tempItem)[0];

            $user = User::find($item->owner);

            $item->sub_category_name = SubCategory::find($item->sub_category)->name;
            $item->item_type_name = ItemsType::find($item->item_type)->name;


            return $this->returnSuccess(['item' => $item, 'user' => $user]);
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }

    /**
     * Get others user's  items
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUsersItems($id)
    {
        try {

            $requestedItems = Item::where('owner', $id)->orderBy('created_at', 'descr')->paginate(7);

            if (!$requestedItems)
                return $this->returnNotFound();

            return $this->returnSuccess(['items' => Util::buildItems($requestedItems), 'total' => $requestedItems->total()]);
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }

    /**
     * Create an item
     * @param Request $request *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        try {
            $user = $this->validateSession();

            $rules = [
                'title' => 'bail|required|max:60',
                'description' => 'bail|required:max:5000',
                'price' => 'bail|required|min:0',
                'currency' => 'bail|required|min:0|max:1',
                'category' => 'bail|required|exists:categories,id',
                'sub_category' => 'bail|required|exists:sub_categories,id',
                'type' => 'bail|required|exists:items_types,id',
                'city' => 'required',
                'district' => 'required',
            ];


            $messages = [
                'title.required' => 'title',
                'title.max' => 'title.max',
                'description.required' => 'description',
                'description.max' => 'description.max',
                'price.required' => 'price',
                'price.min' => 'price.min',
                'currency.required' => 'currency',
                'currency.min' => 'currency',
                'currency.max' => 'currency',
                'category.required' => 'category',
                'sub_category.required' => 'category',
                'category.exists' => 'category.exists',
                'sub_category.exists' => 'category.exists',
                'type.required' => 'type.required',
                'type.exists' => 'type.exists',
                'city.required' => 'location',
                'district.required' => 'location',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if (!$validator->passes())
                return $this->returnBadRequest($validator->errors()->first());

            $category = $request->category;
            $sub_category = $request->sub_category;
            $type = $request->type;

            //array that contains all subcategories for a given category
            $sub_categories = SubCategory::where('category', $category)->get();

            //checks if provided subcategory exists in selected category
            if (!$sub_categories->contains($sub_category)) return $this->returnBadRequest('Categorie invalidă');

            //checks if provided item type exists in selected category->subcategory
            $item_types = ItemsType::where('sub_category', $request->sub_category)->get();


            if (!$item_types->contains($type)) return $this->returnBadRequest('Tip invalid');


            $item = new Item();

            $item->title = $request->title;
            $item->slug = Str::slug($request->title, '-');
            $item->description = $request->description;
            $item->price = $request->price;
            $item->currency = $request->currency;
            $item->negotiable = $request->negotiable;
            $item->change = $request->change;
            $item->category = $category;
            $item->sub_category = $sub_category;
            $item->item_type = $type;
            $item->city = $request->city;
            $item->district = $request->district;
            $item->status = Item::STATUS_ACTIVE;
            $item->owner = $user->id;


            $item->save();

            switch ($category) {
                case Category::ELECTONICE_ELECTROCASNICE :

                    if ($request->has('manufacturer') || $request->has('model') || $request->has('manufacturer_year') || $request->has('used')) {
                        $electronic = new Electronic();

                        $electronic->item_id = $item->item_id;

                        if ($request->has('manufacturer')) $electronic->manufacturer = $request->manufacturer;

                        if ($request->has('model')) $electronic->model = $request->model;

                        if ($request->has('manufacturer_year')) $electronic->manufacturer_year = $request->manufacturer_year;

                        if ($request->has('used')) $electronic->used = $request->used;

                        $electronic->save();
                    }
                    break;

                case  Category::AUTO_MOTO_NAUTICA :
                    if ($request->has('manufacturer') || $request->has('model') || $request->has('manufacturer_year') || $request->has('engine') ||
                        $request->has('power') || $request->has('gearbox') || $request->has('body') || $request->has('fuel_type') ||
                        $request->has('mileage') || $request->has('drive') || $request->has('emission_class') || $request->has('color') ||
                        $request->has('origin') || $request->has('VIN') || $request->has('used') || $request->has('pollution_tax') ||
                        $request->has('damaged') || $request->has('first_owner') || $request->has('registered') || $request->has('right_hand_drive')) {

                        $vehicle = new Vehicle();
                        //building the vehicles object

                        $vehicle->item_id = $item->item_id;

                        if ($request->has('manufacturer')) $vehicle->manufacturer = $request->manufacturer;

                        if ($request->has('model')) $vehicle->model = $request->model;

                        if ($request->has('manufacturer_year')) $vehicle->manufacturer_year = $request->manufacturer_year;

                        if ($request->has('engine')) $vehicle->engine = $request->engine;

                        if ($request->has('power')) $vehicle->power = $request->power;

                        if ($request->has('gearbox')) $vehicle->gearbox = $request->gearbox;

                        if ($request->has('body')) $vehicle->body = $request->body;

                        if ($request->has('fuel_type')) $vehicle->fuel_type = $request->fuel_type;

                        if ($request->has('mileage')) $vehicle->mileage = $request->mileage;

                        if ($request->has('drive')) $vehicle->drive = $request->drive;

                        if ($request->has('emission_class')) $vehicle->emission_class = $request->emission_class;

                        if ($request->has('color')) $vehicle->color = $request->color;

                        if ($request->has('origin')) $vehicle->origin = $request->origin;

                        if ($request->has('VIN')) $vehicle->VIN = $request->VIN;

                        if ($request->has('used')) $vehicle->used = $request->used;

                        if ($request->has('pollution_tax')) $vehicle->pollution_tax = $request->pollution_tax;

                        if ($request->has('damaged')) $vehicle->damaged = $request->damaged;

                        if ($request->has('registered')) $vehicle->registered = $request->registered;

                        if ($request->has('first_owner')) $vehicle->first_owner = $request->first_owner;

                        if ($request->has('right_hand_drive')) $vehicle->right_hand_drive = $request->right_hand_drive;

                        $vehicle->save();
                    }
                    break;
            }

            if ($request->has('images'))
                foreach ($request->images as $image) {
                    $filename = $image->store('images', 'public');
                    ItemsImage::create([
                        'item_id' => $item->item_id,
                        'filename' => $filename
                    ]);
                }

            return $this->returnSuccess();
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }


    /**
     * Update an item
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    /*
     * Title, Price, currency, negotiable, exchange, used, sold by, description, images, contact data
     */
    public function update(Request $request, $id)
    {
        try {

            $rules = [
                'title' => 'bail|max:60',
                'description' => 'bail|max:5000',
                'price' => 'bail|min:0',
                'currency' => 'bail|min:0|max:1',
                'category' => 'bail|required|exists:categories,id',
                'sub_category' => 'bail|required|exists:sub_categories,id',
                'type' => 'bail|required|exists:items_types,id',
            ];


            $messages = [
                'title.max' => 'title.max',
                'description.max' => 'description.max',
                'price.min' => 'price.min',
                'currency.min' => 'currency',
                'currency.max' => 'currency',
                'category.required' => 'category',
                'sub_category.required' => 'category',
                'category.exists' => 'category.exists',
                'sub_category.exists' => 'category.exists',
                'type.required' => 'type.required',
                'type.exists' => 'type.exists',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if (!$validator->passes()) return $this->returnBadRequest($validator->errors()->first());


            $user = $this->validateSession();

            $item = Item::find($id);

            if (!$item) $this->returnBadRequest('Anunțul nu a putut fi găsit');

            if ($user->role_id === Role::ROLE_USER && $user->id !== $item->owner)
                return $this->returnError('Nu aveți drepturile necesare pentru a modifica acest anunț');

            if ($request->has('title')) {
                $item->title = $request->title;
                $item->slug = Str::slug($request->title, '-');
            }

            if ($request->has('description')) $item->description = $request->description;

            if ($request->has('price')) $item->price = $request->price;

            if ($request->has('currency')) $item->currency = $request->currency;

            if ($request->has('negotiable')) $item->negotiable = $request->negotiable;

            if ($request->has('change')) $item->change = $request->change;

//            if ($request->has('location')) $item->location = $request->location;

            if ($request->has('city')) $item->city = $request->city;

            if ($request->has('district')) $item->district = $request->district;

            switch ($item->category) {
                case Category::ELECTONICE_ELECTROCASNICE :

                    if ($request->has('manufacturer') || $request->has('model') || $request->has('manufacturer_year') || $request->has('used')) {

                        $electronic = Electronic::find($id);

                        if ($request->has('manufacturer')) $electronic->manufacturer = $request->manufacturer;

                        if ($request->has('model')) $electronic->model = $request->model;

                        if ($request->has('manufacturer_year')) $electronic->manufacturer_year = $request->manufacturer_year;

                        if ($request->has('used')) $electronic->used = $request->used;

                        $electronic->save();
                    }
                    break;

                case  Category::AUTO_MOTO_NAUTICA :
                    if ($request->has('manufacturer') || $request->has('model') || $request->has('manufacturer_year') || $request->has('used')) {

                        $vehicle = Vehicle::find($id);

                        if ($request->has('manufacturer')) $vehicle->manufacturer = $request->manufacturer;

                        if ($request->has('model')) $vehicle->model = $request->model;

                        if ($request->has('manufacturer_year')) $vehicle->manufacturer_year = $request->manufacturer_year;

                        if ($request->has('engine')) $vehicle->engine = $request->engine;

                        if ($request->has('power')) $vehicle->power = $request->power;

                        if ($request->has('gearbox')) $vehicle->gearbox = $request->gearbox;

                        if ($request->has('body')) $vehicle->body = $request->body;

                        if ($request->has('fuel_type')) $vehicle->fuel_type = $request->fuel_type;

                        if ($request->has('mileage')) $vehicle->mileage = $request->mileage;

                        if ($request->has('drive')) $vehicle->drive = $request->drive;

                        if ($request->has('emission_class')) $vehicle->emission_class = $request->emission_class;

                        if ($request->has('color')) $vehicle->color = $request->color;

                        if ($request->has('origin')) $vehicle->origin = $request->origin;

                        if ($request->has('VIN')) $vehicle->VIN = $request->VIN;

                        if ($request->has('used')) $vehicle->used = $request->used;

                        if ($request->has('pollution_tax')) $vehicle->pollution_tax = $request->pollution_tax;

                        if ($request->has('damaged')) $vehicle->damaged = $request->damaged;

                        if ($request->has('first_owner')) $vehicle->first_owner = $request->first_owner;

                        if ($request->has('right_hand_drive')) $vehicle->right_hand_drive = $request->right_hand_drive;

                        $vehicle->save();
                    }
                    break;
            }
            if ($request->has('images'))
                foreach ($request->images as $image) {
                    $filename = $image->store('images', 'public');
                    ItemsImage::create([
                        'item_id' => $item->item_id,
                        'filename' => $filename
                    ]);
                }

            if ($request->has('imageFilenames'))
                foreach ($request->imageFilenames as $image)
                    Storage::disk('public')->delete($image);


            if ($request->has('imageIds'))
                foreach ($request->imageIds as $id)
                    ItemsImage::find($id)->delete();

            $item->save();
            return $this->returnSuccess();
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }


    /**
     * Delete an item
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        try {
            $user = $this->validateSession();

            $item = Item::find($id);

            if (!$item) return $this->returnBadRequest('Item not found');

            if ($user->role_id === Role::ROLE_USER && $user->id !== $item->owner)
                return $this->returnError('item.delete.403');

            $images = ItemsImage::where('item_id', $id)->get();

            foreach ($images as $image)
                Storage::disk('public')->delete($image->filename);

            $item->delete();

            return $this->returnSuccess($images);
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }


    /**
     * Testing purposes
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function test(Request $request)
    {
        try {

            return $this->returnSuccess();
        } catch
        (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }

    /**
     * Build items
     * @param $data
     * @return mixed
     */
}