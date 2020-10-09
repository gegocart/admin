<?php

namespace App\Http\Controllers\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductGallery;
use App\Models\CategoryProduct;
use App\Models\AttributesetCategory;
use App\Models\Attribute;
use App\Models\AttributeProduct;
use App\Models\ProductVariation;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Input; 
use App\Http\Resources\ProductIndexResource;
use Illuminate\Support\Facades\Auth;

class ProductCategoryController extends Controller
{
    public function getproductcategorylist()
    {
    	$productcategory=ProductCategory::with('categories.products')->get();

    	//dd($productcategory);
    }

    public function getProductCategory(Request $request) //display product list
    {
      $show=(int)$request->show;
      
      if($show!=0){
        $productcategory=Product::with('productcategory','stores')
        ->where('user_id',Auth::id())->paginate($show);
                               
      }
      else{
        $productcategory=Product::with('productcategory','stores')
        ->where('user_id',Auth::id())->paginate(15);
                              
      }
      
      return ($productcategory);
    }

    public function searchproduct(Request $request) //seller
    {
         

     $search=$request->name;
       // dd($search);

       $products = Product::with('productcategory','stores')->where('user_id',Auth::id());
 
    if($search!="" || $search!=null)
    {
        
       $products = Product::with('productcategory','stores')->where('user_id',Auth::id())->Where(function($query)use ($search){
        $query->orWhere('name','LIKE',$search.'%')->orWhere('slug','LIKE',$search.'%')->orWhere('type','LIKE',$search.'%')
         ->orwhereHas('stores',function($q) use ($search){
            $q->Where('name','LIKE',$search.'%');
            })->orwhereHas('productcategory',function($q) use ($search){
            $q->Where('name','LIKE',$search.'%');
            });

         })->paginate(15);
          
         
       if(count($products)>0){
        
         return $products;
       }
  
    }
    else{
      return $products->paginate(15);
    }


    }
    

    public function showproductdetail($slug,$userid)
    {
      
       $products = Product::with('productcategory','stores','productanswer','productquestion','variations.type')->where('user_id',$userid)->where('slug',$slug)->first();
       
         return new ProductStoreDetailResource(
                $products
            );
    }
    




}


