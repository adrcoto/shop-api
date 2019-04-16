<?php

namespace App\Http\Controllers\v1;


use App\Item;
use App\ItemsType;
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
             * Sends searched items with images
             */

            $items = new Collection();

            if ($request->has('q')) {
                $vehicles = DB::table('items')
                    ->join('vehicles', 'items.item_id', '=', 'vehicles.item_id')
                    ->where('items.title', 'LIKE', '%' . $request->q . '%')
                    ->orderBy('updated_at', 'desc')
                    ->get();

                //electronics
                $electronics = DB::table('items')
                    ->join('electronics', 'items.item_id', '=', 'electronics.item_id')
                    ->where('items.title', 'LIKE', '%' . $request->q . '%')
                    ->orderBy('updated_at', 'desc')
                    ->get();
            } else {
                $vehicles = DB::table('items')
                    ->join('vehicles', 'items.item_id', '=', 'vehicles.item_id')
                    ->orderBy('updated_at', 'desc')
                    ->get();

                //electronics
                $electronics = DB::table('items')
                    ->join('electronics', 'items.item_id', '=', 'electronics.item_id')
                    ->orderBy('updated_at', 'desc')
                    ->get();
            }


            foreach ($vehicles as $vehicle)
                $items->push($vehicle);

            foreach ($electronics as $electronic)
                $items->push($electronic);
            foreach ($items as $item)
                $item->images = DB::table('items_images')->where('item_id', '=', $item->item_id)->get();

            if ($items->isEmpty())
                return $this->returnNotFound('Bate vantul pe aici');
            $this->quickSort($items, 0, count($items) - 1);


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
                'type' => 'required|exists:items_types,id',
                'location' => 'required',
            ];


            $validator = Validator::make($request->all(), $rules);

            if (!$validator->passes())
                return $this->returnBadRequest($validator->errors());

            $category = $request->category;
            $sub_category = $request->sub_category;
            $type = $request->type;

            //array that contains all subcategories for a given category
            $sub_categories = SubCategory::where('category', $category)->get();

            //checks if provided subcategory exists in selected category
            if (!$sub_categories->contains($sub_category))
                return $this->returnBadRequest('Invalid Sub-category');

            //checks if provided item type exists in selected category->subcategory
            $item_types = ItemsType::where('sub_category', $request->sub_category)->get();


            if (!$item_types->contains($type))
                return $this->returnBadRequest('Invalid item type');


            $item = new Item();

            $item->title = $request->title;
            $item->description = $request->description;
            $item->price = $request->price;
            $item->currency = $request->currency;
            $item->category = $category;
            $item->location = $request->location;
            $item->status = Item::STATUS_ACTIVE;
            $item->owner = $user->id;

            $item->save();

            switch ($category) {
                case Category::ELECTONICE_ELECTROCASNICE :

                    if ($request->has('manufacturer') || $request->has('model') || $request->has('manufacturer_year') || $request->has('used')) {
                        $electronic = new Electronic();

                        $electronic->item_id = $item->id;
                        $electronic->sub_category = $sub_category;
                        $electronic->item_type = $type;

                        if ($request->has('manufacturer'))
                            $electronic->manufacturer = $request->manufacturer;

                        if ($request->has('model'))
                            $electronic->model = $request->model;

                        if ($request->has('manufacturer_year'))
                            $electronic->manufacturer_year = $request->manufacturer_year;

                        if ($request->has('used'))
                            $electronic->used = $request->used;

                        $electronic->save();
                    }
                    break;

                case  Category::AUTO_MOTO_NAUTICA :
                    if ($request->has('manufacturer') || $request->has('model') || $request->has('manufacturer_year') || $request->has('used')) {

                        $vehicle = new Vehicle();
                        //building the vehicles object

                        $vehicle->item_id = $item->id;
                        $vehicle->sub_category = $sub_category;
                        $vehicle->item_type = $type;

                        if ($request->has('manufacturer'))
                            $vehicle->manufacturer = $request->manufacturer;

                        if ($request->has('model'))
                            $vehicle->model = $request->model;

                        if ($request->has('manufacturer_year'))
                            $vehicle->manufacturer_year = $request->manufacturer_year;

                        if ($request->has('engine'))
                            $vehicle->engine = $request->engine;

                        if ($request->has('power'))
                            $vehicle->power = $request->power;

                        if ($request->has('gearbox'))
                            $vehicle->gearbox = $request->gearbox;

                        if ($request->has('body'))
                            $vehicle->body = $request->body;

                        if ($request->has('fuel_type'))
                            $vehicle->fuel_type = $request->fuel_type;

                        if ($request->has('mileage'))
                            $vehicle->mileage = $request->mileage;

                        if ($request->has('drive'))
                            $vehicle->drive = $request->drive;

                        if ($request->has('emission_class'))
                            $vehicle->emission_class = $request->emission_class;

                        if ($request->has('color'))
                            $vehicle->color = $request->color;

                        if ($request->has('origin'))
                            $vehicle->origin = $request->origin;

                        if ($request->has('VIN'))
                            $vehicle->VIN = $request->VIN;

                        if ($request->has('used'))
                            $vehicle->used = $request->used;

                        if ($request->has('pollution_tax'))
                            $vehicle->pollution_tax = $request->pollution_tax;

                        if ($request->has('damaged'))
                            $vehicle->damaged = $request->damaged;

                        if ($request->has('first_owner'))
                            $vehicle->first_owner = $request->first_owner;

                        if ($request->has('right_hand_drive'))
                            $vehicle->right_hand_drive = $request->right_hand_drive;

                        $vehicle->save();
                    }
                    break;
            }

            if ($request->has('images'))
                foreach ($request->images as $image) {
                    $filename = $image->store('images', 'public');
                    ItemsImage::create([
                        'item_id' => $item->id,
                        'filename' => $filename
                    ]);
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
            $category = $request->category;
            $sub_category = $request->sub_category;
            $type = $request->type;

            //array that contains all subcategories for a given category
            $sub_categories = SubCategory::where('category', $category)->get();

            //checks if provided subcategory exists in selected category
            if (!$sub_categories->contains($sub_category))
                return $this->returnBadRequest('Invalid Sub-category');

            //checks if provided item type exists in selected category->subcategory
            $item_types = ItemsType::where('sub_category', $request->sub_category)->get();


            if (!$item_types->contains($type))
                return $this->returnBadRequest('Invalid item type');

            return $this->returnSuccess();
        } catch
        (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }


    private function partition(&$arr, $leftIndex, $rightIndex)
    {
        $pivot = $arr[($leftIndex + $rightIndex) / 2]->created_at;

        while ($leftIndex <= $rightIndex) {
            while ($arr[$leftIndex]->created_at > $pivot)
                $leftIndex++;
            while ($arr[$rightIndex]->created_at < $pivot)
                $rightIndex--;
            if ($leftIndex <= $rightIndex) {
                $tmp = $arr[$leftIndex];
                $arr[$leftIndex] = $arr[$rightIndex];
                $arr[$rightIndex] = $tmp;
                $leftIndex++;
                $rightIndex--;
            }
        }
        return $leftIndex;
    }


    private function quickSort(&$arr, $leftIndex, $rightIndex)
    {
        $index = $this->partition($arr, $leftIndex, $rightIndex);
        if ($leftIndex < $index - 1)
            $this->quickSort($arr, $leftIndex, $index - 1);
        if ($index < $rightIndex)
            $this->quickSort($arr, $index, $rightIndex);
    }


}