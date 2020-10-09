<?php

namespace App\Http\Controllers\stores;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Http\Resources\ProductStoreResource;
use App\Http\Resources\StoreIndexResource;
use App\Models\Product;
use App\Http\Resources\ProductIndexResource;
use App\Scoping\Scopes\CategoryScope;
 


class StoreBuyerController extends Controller
{
    public function searchPrice(Request $request,$minval,$maxval)
    {
          
       $store=Store::with('products')->where('status',1)->where('slug',$request->category)->first();

       if(is_null($store))
       {
          return response()->json(['error'=>422,'message'=>'Unprocessable Entity'],422);
       }

      $products;
      $result;
      $min=0;
      $max=0;
      try
      {
             
        $min=$minval* 100; //converting to paise
        $max=$maxval * 100;
      
        $products = Product::with(['variations.stock','categories',
                          'rating','variations.type', 'users'])->where('status',1);
          if(($min==0 || $min>0) && ($max!=0) )
          {

           
            $result=$products->where('store_id',$store->id)->whereBetween('price',[$min,$max])->paginate(10);
            
            
          }
          else{
          
           
            // $products = $products->paginate(10); 
             $result=$products->where('store_id',$store->id)->where('price','>=',$max)->paginate(10);
            // $result=$products;                                             
           
          }


        return ProductIndexResource::collection($result);
           
      
       // $store=Store::where('status', 1)->where('slug', $slug)->Active()->first();

      //  $store=Store::with('products')->where('status',1)->where('slug',$request->category)->first();
       

      //  if(is_null($store))
      //  {
      //    return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
      //  }

      //  $products;
      // $result;
      // $min=0;
      // $max=0;
      // try
      // {
             
      //   $min=$minval* 100; //converting to paise
      //   $max=$maxval * 100;
       
        
      //     if(($min==0 || $min>0) && ($max!=0) )
      //     {
          
 
           
      //     $store=Store::with(['products'=>function($qurey)use($min,$max,$store){ $qurey->where('store_id',$store->id)->whereBetween('price',[$min,$max]); }])->where('slug', $request->category)->first();    
                       

      //       return $store;
           

      //     }
          
         
      //  $data=$store->setRelation('products', $store->products()->paginate(5));
      //  return $data;

         

      }
      catch(Exception $e)
      {
         // dd($e->getMessage());
      }     
                
    }

    public function getstoreproduct($slug)
    {
       
       $store=Store::with('products')->where('status',1)->where('slug',$slug)->first();
       
       if(is_null($store))
       {
          return response()->json(['error'=>422,'message'=>'Unprocessable Entity'],422);
       }

       $products = Product::with(['variations.stock','categories',
                          'rating','variations.type', 'users'])->where('status',1)
       ->where('store_id',$store->id)->withScopes($this->scopes());

        $products=$products->paginate(10);

       
      
        return ProductIndexResource::collection(
                $products
            );


    }

    public function ratingFilter(Request $request)
    {
        // dd($request->category,$request->rating);

      $store=Store::with('products')->where('status',1)->where('slug',$request->category)->first();

       if(is_null($store))
       {
          return response()->json(['error'=>422,'message'=>'Unprocessable Entity'],422);
       }

       $products=Product::with(['variations.stock','categories','users'
      ,'rating','variations.type'])->where('status',1)->where('store_id',$store->id)->where('ratings','>=',$request->rating)->paginate(10); 

       // return $products;
        return ProductIndexResource::collection($products);
    }

    public function brandFilter(Request $request)
    {
      
       $store=Store::with('products')->where('status',1)->where('slug',$request->slug)->first();

       if(is_null($store))
       {
          return response()->json(['error'=>422,'message'=>'Unprocessable Entity'],422);
       }

       $products=Product::with(['variations.stock','categories','users'
      ,'rating','variations.type'])->where('status',1)->where('store_id',$store->id)->where('brand',$request->brand)->paginate(10); 

       // return $products;
        return ProductIndexResource::collection($products);
    }

    
    public function getStore($slug)
    {

    
       $store=Store::with(['products'=>function($q){
        $q->where('status',1);
       }])->where('status',1)->where('slug',$slug)->first();


       if(is_null($store))
       {
         return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
       }

       return $store;
    }

    public function filter(Request $request)
    {
       $store=Store::with('products')->where('status',1)->where('slug',$request->category)->first();

       if(is_null($store))
       {
          return response()->json(['error'=>422,'message'=>'Unprocessable Entity'],422);
       }

      $products = Product::with(['variations.stock','categories',
                          'rating','variations.type', 'users'])->where('status',1)->where('store_id',$store->id);


      if($request->filterby=='lowtohigh')
      {
               $products=$products->priceascending()->paginate(10);
      }
      else
      {
            $products=$products->pricedescending()->paginate(10); 
      }

          return ProductIndexResource::collection($products);

    }

    public function show($slug)
    {

        $store=Store::where('status', 1)->where('slug', $slug)->Active()->first();
       if(is_null($store))
       {
          return response()->json(['error'=>422,'message'=>'Unprocessable Entity'],422);
       }
    
        return new StoreIndexResource($store);
    }
 
     
    public function activestores()
    {

       // return StoreIndexResource::collection(Store::Active()->get());

       return StoreIndexResource::collection(Store::Active()->paginate(8));


    }

     
    public function getmystores(){

          $stores = Store::where('user_id',auth()->user()->id)->Active()->get();     
          return StoreIndexResource::collection($stores);
    }

      protected function scopes()
    {
        return [
            'category' => new CategoryScope()
        ];
    }


}
