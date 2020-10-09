<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Models\ProductCategory;

class ProductCategotyController extends Controller
{
    public function getproductcategorylist()
    {
    	$productcategory=ProductCategory::get();

    	//dd($productcategory);
    }
}
