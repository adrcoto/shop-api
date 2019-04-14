<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\ItemsImage;
use App\NewItem;
use App\Role;
use App\Item;
USE App\Car;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


/**
 * Class ItemController
 *
 * @package App\Http\Controllers\v1
 */
class ItemController extends Controller
{
    /**
     * Get tasks list
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll()
    {
        try {
            $items = Item::paginate(10);
            //$items = Item::where('category', 1)->where('sub_category', 1)->get();

            return $this->returnSuccess($items);
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
            /*
             * Sends items with images
             */
            $result = Item::where('title', 'LIKE', '%' . $request->q . '%')->get();
            $items = collect();

            foreach ($result as $item) {
                $itemImages = ItemsImage::where('item_id', $item->id)->get();

                $buffer = collect($item);
                $itemWithImages = $buffer->merge(['images' => $itemImages]);
                $items->push($itemWithImages);
            }

            return $this->returnSuccess($items);
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }

    /**
     * Create an item
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        try {
            $user = $this->validateSession();

            $rules = [
                'title' => 'required',
                'description' => 'required',
                'price' => 'required',
                'currency' => 'required',
                'category' => 'required|exists:categories,id',
                'sub_category' => 'required|exists:sub_categories,id',
                'location' => 'required',
            ];


            $validator = Validator::make($request->all(), $rules);

            if (!$validator->passes())
                return $this->returnBadRequest($validator->errors());


            $category = $request->category;
            $sub_category = $request->sub_category;
            //array that contains all subcategories for a given category
            $sub = SubCategory::where('category', $category)->get();

            //checks if provided subcategory exists in selected category
            if (!$sub->contains($request->sub_category))
                return $this->returnBadRequest('Invalid Category');

            $item = new Item();

            $item->title = $request->title;
            $item->description = $request->description;
            $item->price = $request->price;
            $item->currency = $request->currency;
            $item->category = $category;
            $item->sub_category = $sub_category;
            $item->location = $request->location;
            $item->status = Item::STATUS_ACTIVE;
            $item->owner = $user->id;

            $item->save();

            switch ($category) {
                case Category::ELECTONICE_ELECTROCASNICE :
                    //check for sub_category
                    switch ($sub_category) {
                        case SubCategory::LAPTOP_PC_PERIFERICE :
                            //todo create item and save it
                            break;
                        case SubCategory::TELEFOANE :
                            //todo create item and save it
                            break;
                        case SubCategory::TV_AUDIO_FOTO_VIDEO :
                            //todo create item and save it
                            break;
                    }
                    break;
                case  Category::AUTO_MOTO_NAUTICA :
                    //check for sub_category
                    switch ($sub_category) {
                        case SubCategory::AUTOTURISME :
                            //todo create item and save it
                            $car = new Car();
                            //building the car object

                            $car->item = $item->id;
                            $car->category = Category::AUTO_MOTO_NAUTICA;
                            $car->sub_category = SubCategory::AUTOTURISME;

                            $car->manufacturer = $request->manufacturer;
                            $car->model = $request->model;
                            $car->body = $request->body;
                            $car->fuel_type = $request->fuel_type;
                            $car->manufacturer_year = $request->manufacturer_year;
                            $car->mileage = $request->mileage;
                            $car->status = $request->status;
                            $car->engine = $request->engine;
                            $car->origin = $request->origin;
                            $car->power = $request->power;
                            $car->gearbox = $request->gearbox;
                            $car->drive = $request->drive;
                            $car->emission_class = $request->emission_class;
                            $car->color = $request->color;
                            $car->VIN = $request->VIN;
                            $car->pollution_tax = $request->pollution_tax;
                            $car->damaged = $request->damaged;
                            $car->registered = $request->registered;
                            $car->first_owner = $request->first_owner;
                            $car->right_hand_drive = $request->right_hand_drive;

                            $car->save();

                            if ($request->has('images'))
                                foreach ($request->images as $image) {
                                    $filename = $image->store('images', 'public');
                                    ItemsImage::create([
                                        'item_id' => $item->id,
                                        'filename' => $filename
                                    ]);
                                }
                            break;
                        case SubCategory::MOTOCICLETE_ATV_SCUTERE :
                            //todo create item and save it
                            break;
                        case SubCategory::PIESE_ACCESORII_CONSUMABILE :
                            //todo create item and save it
                            break;
                    }
                    break;
                case Category::IMOBILIARE :
                    //check for sub_category
                    switch ($sub_category) {
                        case SubCategory::GARSONIERE_DE_INCHIRIAT :
                            //todo create item and save it
                            break;
                        case SubCategory::GARSONIERE_DE_CUMPARAT :
                            //todo create item and save it
                            break;
                        case SubCategory::SPATII_COMERCIALE_BIROURI :
                            //todo create item and save it
                            break;
                    }
                    break;
            }


//            $filename = $request->file('images')->store('images','public');
//            ItemsImage::create([
//                'item_id' => $item->id,
//                'filename' => $filename
//            ]);

            return $this->returnSuccess();
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }

    /**
     * Update a task
     *
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $user = $this->validateSession();

            $task = Item::find($id);

            if ($user->role_id === Role::ROLE_USER && $user->id !== $task->assign) {
                return $this->returnError('You don\'t have permission to update this task');
            }

            if ($request->has('name')) {
                $task->name = $request->name;
            }

            if ($request->has('description')) {
                $task->description = $request->description;
            }

            if ($request->has('status')) {
                $task->status = $request->status;
            }

            if ($request->has('assign')) {
                $task->assign = $request->assign;
            }

            $task->save();

            return $this->returnSuccess();
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }

    /**
     * Delete a task
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        try {
            $user = $this->validateSession();

            if ($user->role_id !== Role::ROLE_ADMIN) {
                return $this->returnError('You don\'t have permission to delete this task');
            }

            $task = Item::find($id);

            $task->delete();

            return $this->returnSuccess();
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }

    /**
     * Takes images for certain item
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function getImages($id)
    {

        try {
            $images = ItemsImage::where('item_id', $id)->get();

            return $this->returnSuccess($images);
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }

    public function test(Request $request)
    {
        try {
            $image = 'cayenne1.jpg';
            $cayenne = 'cayenne2.jpg';
            $turbo = 'storage/app/hard-images/cayenne3.jpg';
            $url = Storage::url($turbo);


           return $this->returnSuccess($url);
       } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }
}