<?php

namespace App\Http\Controllers\v1;


use App\Item;
use App\Role;
use App\User;
use App\Electronic;
use App\Vehicle;
use App\ItemsImage;
use App\Category;
use App\SubCategory;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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

            if ($request->has('q'))
                $result = Item::where('title', 'LIKE', '%' . $request->q . '%')->get();
            else
                $result = Item::all();


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

                    //todo create item and save it
                    $vehicles = new Vehicle();
                    //building the vehicles object

                    $vehicles->item_id = $item->id;
                    $vehicles->sub_category = SubCategory::AUTOTURISME;

                    $vehicles->manufacturer = $request->manufacturer;
                    $vehicles->model = $request->model;
                    $vehicles->body = $request->body;
                    $vehicles->fuel_type = $request->fuel_type;
                    $vehicles->manufacturer_year = $request->manufacturer_year;
                    $vehicles->mileage = $request->mileage;
                    $vehicles->used  = $request->status;
                    $vehicles->engine = $request->engine;
                    $vehicles->origin = $request->origin;
                    $vehicles->power = $request->power;
                    $vehicles->gearbox = $request->gearbox;
                    $vehicles->drive = $request->drive;
                    $vehicles->emission_class = $request->emission_class;
                    $vehicles->color = $request->color;
                    $vehicles->VIN = $request->VIN;
                    $vehicles->pollution_tax = $request->pollution_tax;
                    $vehicles->damaged = $request->damaged;
                    $vehicles->registered = $request->registered;
                    $vehicles->first_owner = $request->first_owner;
                    $vehicles->right_hand_drive = $request->right_hand_drive;

                    $vehicles->save();

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
            $items = DB::select('select * from items as i, vehicles as v, electronics as e where i.item_id = v.item_id or i.item_id = e.item_id group by i.updated_at desc');

            foreach ($items as $item)
                $item->images = DB::table('items_images')->where('item_id', '=', $item->item_id)->get();



            $wwww = DB::table('items')
                ->join('vehicles', 'items.item_id', '=', 'vehicles.item_id')
                ->join('electronics', 'items.item_id', '=', 'electronics.item_id')
                ->get();
//
//            foreach ($items as $vehicle)
//                $vehicle->images = DB::table('items_images')->where('item_id', '=', $vehicle->item_id)->get();







            return $this->returnSuccess($items);

        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }
}