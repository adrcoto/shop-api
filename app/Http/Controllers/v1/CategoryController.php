<?php

namespace App\Http\Controllers\v1;


use App\Category;
use App\Http\Controllers\Controller;


/**
 * Class CategoryController
 * @package App\Http\Controllers\v1
 */
class CategoryController extends Controller
{

    /**
     * Returns all available categories
     * @return \Illuminate\Http\JsonResponse
     */
    public function categories()
    {
        try {
            $categories = Category::orderBy('name')->get();
            return $this->returnSuccess($categories);
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }

}