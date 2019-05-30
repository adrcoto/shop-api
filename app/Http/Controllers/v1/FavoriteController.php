<?php


namespace App\Http\Controllers\v1;

use App\Favorite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class FavoriteController
 * @package App\Http\Controllers\v1
 */
class FavoriteController extends Controller
{

    public function get()
    {
        try {
            $user = $this->validateSession();

            $items = Favorite::where('user', $user->id)->get();

            return $this->returnSuccess($items);
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }

    public function add(Request $request)
    {
        try {
            $user = $this->validateSession();

            $alreadyFavorite = Favorite::where('item', $request->item)->first();

            if ($alreadyFavorite)
                return $this->returnError('Item is already favorite');

            $favorite = new Favorite();

            $favorite->user = $user->id;
            $favorite->item = $request->item;

            $favorite->save();
            return $this->returnSuccess();
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }

    public function remove($id)
    {
        try {
            $user = $this->validateSession();
            $favorite = Favorite::where('item', $id)->where('user', $user->id)->first();

            if (!$favorite)
                return $this->returnNotFound('Item not found');

            if ($user->id != $favorite->user)
                return $this->returnError('You don\'t have permission to remove this item from favorites');

            $favorite->delete();

            return $this->returnSuccess();
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }
}