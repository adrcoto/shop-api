<?php


namespace App\Http\Controllers\v1;


use App\SubCategory;
use App\Http\Controllers\Controller;

/**
 * Class SubcategoryController
 * @package App\Http\Controllers\v1
 */
class SubcategoryController extends Controller
{
    /**
     * Returns all available subcategories for a given category
     * @return \Illuminate\Http\JsonResponse
     */
    public function subcategories($id)
    {
        try {
            $subcategories = SubCategory::where('category', $id)->get();
            return $this->returnSuccess($subcategories);
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }
}