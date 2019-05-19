<?php


namespace App\Http\Controllers\v1;

use App\ItemsType;
use App\Http\Controllers\Controller;

class ItemTypeController extends Controller
{
    public function types($id)
    {
        try {
            $types = ItemsType::where('sub_category', $id)->get();
            return $this->returnSuccess($types);
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }
}