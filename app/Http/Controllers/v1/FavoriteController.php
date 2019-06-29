<?php

namespace App\Http\Controllers\v1;

use App\Favorite;
use App\Http\Controllers\Controller;
use App\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class FavoriteController
 * @package App\Http\Controllers\v1
 */
class FavoriteController extends Controller
{


    public function getAll()
    {
        try {
            $user = $this->validateSession();

            $requestedItems = Favorite::where('user', $user->id)->get();

            return $this->returnSuccess($requestedItems);
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }

    public function get(Request $request)
    {
        try {
            $perPage = $request->perPage;
            $user = $this->validateSession();

            $requestedItems = DB::table('items')
                ->join('favorites', 'items.item_id', '=', 'favorites.item')
                ->where('favorites.user', '=', $user->id)
                ->orderBy('favorites.created_at')
                ->paginate($perPage);

            return $this->returnSuccess(['items' => Util::buildItems($requestedItems), 'total' => $requestedItems->total()]);
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }

    public function add(Request $request)
    {
        try {
            $user = $this->validateSession();

            $alreadyFavorite = Favorite::where('item', $request->item)->where('user', $user->id)->first();

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
                return $this->returnNotFound('Anunțul nu a putut fi găsit');

            if ($user->id != $favorite->user)
                return $this->returnError('Nu aveți permisiunea pentru a șterge acest anunț');

            $favorite->delete();

            return $this->returnSuccess();
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }
}