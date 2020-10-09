<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\CategoryProduct;
use App\Http\Resources\BrandResource;


class BrandController extends Controller
{
    public function index(Request $request)
    {
    
       $brands=Product::whereNotNull('brand')->groupBy('brand')->pluck('brand');
       $moreBrand=$brands->count();
       $brands=$brands->take(10)->toArray();
 
       return [
          'brands'=>$brands,
          'moreBrand'=>$moreBrand>10?$moreBrand-10:'',
       ];

    }

    public function getBrands(Request $request)
    {  
         

         
      
       // $search=$request->search;
       
            if($request->from=="product")
       {
          $brands=Product::whereNotNull('brand')->groupBy('brand');
           // if($search!='')
           // {
           //   $brands=Product::where('brand','LIKE',$search.'%')->whereNotNull('brand')->groupBy('brand');
           // }
       }
       else if($request->category!='')
       {   

           $category=Category::where('slug',$request->category)->first();
           $productIds=CategoryProduct::where('category_id',$category->id)->pluck('product_id')->toArray();
           
           $brands=Product::whereIn('id',$productIds)->whereNotNull('brand')->groupBy('brand')->selectRaw('brand,count(brand) as count');

           // dump($brands->get());
           // if($search!='')
           // {

           //  $brands=Product::whereIn('id',$productIds)->where('brand','LIKE',$search.'%')->whereNotNull('brand')->groupBy('brand')->selectRaw('brand,count(brand) as count');

           //  }
            
       }
       else if($request->slug!='')
       {
            $store=Store::with('products')->where('status',1)->where('slug',$request->slug)->first();
           if(is_null($store))
           {
              return response()->json(['error'=>422,'message'=>'Unprocessable Entity'],422);
           }
    
           $brands=Product::where('store_id',$store->id)->whereNotNull('brand')->groupBy('brand');

           // if($search!='')
           // {
           //    $brands=Product::where('store_id',$store->id)->where('brand','LIKE',$search.'%')->whereNotNull('brand')->groupBy('brand');
           // }
       }
       return BrandResource::collection($brands->get());
    }

   public function getcategoryBrand(Request $request)
   {

     $category=Category::where('slug',$request->category)->first();
     $productIds=CategoryProduct::where('category_id',$category->id)->pluck('product_id')->toArray();
     $brands=Product::whereIn('id',$productIds)->whereNotNull('brand')->distinct('brand')->pluck('brand');
     $moreBrand=$brands->count();
     $brands=$brands->take(5)->toArray();

     return [
        'brands'=>$brands,
        'moreBrand'=>$moreBrand>5?$moreBrand-5:'',
     ];

       

   }   

    public function getStoreBrand(Request $request)
   {
     
     $store=Store::with('products')->where('status',1)->where('slug',$request->slug)->first();

       if(is_null($store))
       {
          return response()->json(['error'=>422,'message'=>'Unprocessable Entity'],422);
       }
  
     $brands=Product::where('store_id',$store->id)->whereNotNull('brand')->distinct('brand')->pluck('brand');
     $moreBrand=$brands->count();
     $brands=$brands->take(10)->toArray();

     return [
        'brands'=>$brands,
        'moreBrand'=>$moreBrand>10?$moreBrand-10:'',
     ];

   }   

}
