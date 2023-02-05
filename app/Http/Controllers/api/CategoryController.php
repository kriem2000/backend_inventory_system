<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\api\BaseController;
use App\Models\ItemCategories;

class CategoryController extends BaseController
{
    public function getAllCategories(){
        return ItemCategories::all();
    }
}
