<?php


namespace App\Http\Controllers\v1;

use App\Category;
use App\Electronic;
use App\Favorite;

use App\Http\Controllers\Controller;
use App\Util;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

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

            $requestedItems = DB::table('items')
                ->join('favorites', 'items.item_id', '=', 'favorites.item')
                ->where('favorites.user', '=', $user->id)->orderBy('favorites.created_at')->get();

            return $this->returnSuccess(Util::buildItems($requestedItems));
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
                return $this->returnError('Anunțul este deja in lista de anuțuri favorite');

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