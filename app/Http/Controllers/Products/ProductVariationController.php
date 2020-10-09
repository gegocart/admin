<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductVariation;
use App\Models\AttributeProduct;
use App\Models\AttributesetCategory;
use App\Models\Attribute;
use App\Http\Resources\AttributeProductResource;
use App\Http\Resources\VariationResource;
use App\Models\Product;
class ProductVariationController extends Controller
{
    

    public function getAttributeProduct($productid)
    {
       $res=[];
     
       $attributeproduct=AttributeProduct::where('product_id',$productid)->get();
      
       return AttributeProductResource::collection(
         $attributeproduct
       );
     
    }

    public function getVariation($slug)
    {
          // $product=Product::with(['variations'=>function($query){
          //   $query->groupby('type');
          // }])->where('slug',$slug)->first();
          // return $product;

    }

    public function getProductVariation($productid)
    {
      $productvariation=ProductVariation::with('attributeproduct')
                              ->where('product_id',$productid)->get();
                            
      return VariationResource::collection(
         $productvariation
      );
    
    }
}
