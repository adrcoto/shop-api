<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\ItemsImage;
use App\Role;
use App\Item;
use Illuminate\Http\Request;
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
    public function search(Request $request){
        try {
            $items = Item::where('title', 'LIKE', '%'.$request->q.'%')->get();
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
                'category' => 'required',
                'sub_category' => 'required',
                'location' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if (!$validator->passes()) {
                return $this->returnBadRequest('Please fill all required fields');
            }

            $item = new Item();

            $item->title = $request->title;
            $item->description = $request->description;
            $item->price = $request->price;
            $item->category = $request->category;
            $item->sub_category = $request->sub_category;
            $item->location = $request->location;
            $item->status = Item::STATUS_ACTIVE;
            $item->owner = $user->id;

            $item->save();


            if ($request->has('images'))
            foreach ($request->images as $image) {
                $filename = $image->store('images', 'public');
                ItemsImage::create([
                    'item_id' => $item->id,
                    'filename' => $filename
                ]);
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

    public function getImages($id){

        try {
        $images = ItemsImage::where('item_id',$id)->get();

        return $this->returnSuccess($images);
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }
}