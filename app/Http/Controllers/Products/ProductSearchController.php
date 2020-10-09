<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProductIndexResource;
use App\Models\Product;
use App\Models\RatingReview;
use App\Models\CategoryProduct;
use App\Models\Category;
use App\Models\User;
use App\Scoping\Scopes\CategoryScope;
use Exception;
use Illuminate\Support\Facades\Auth;

class ProductSearchController extends Controller
{
  
    public function searchproductdetail(Request $request) //buyer
    {
      $res=[];
           try
           {
            $search = $request->searchquery; //Input::get('searchquery');
             //dd($request->searchquery);
             if($search!="" || $search!=null)
             {
              $products = Product::with(['variations.stock','categories','users'])->where('status',1);

              $searchresult=$products->where(function($query) use($search){
                    $query->where('description','LIKE','%' . $search . '%')
                     ->orwhere('name','LIKE','%' . $search . '%')
                    ->orwhere('slug','LIKE','%' . $search . '%')
                    ->orwhere('description','LIKE','%' . $search . '%');
              })->paginate(3);
                                 
                  
                 if (count($searchresult) > 0)
                  {
                    
                    return ProductIndexResource::collection(
                    $searchresult
                );
                  }
             }
             else
             {
              $products = Product::with(['variations.stock','categories','users'])->where('status',1)->get();
                 return ProductIndexResource::collection(
                    $products
                );
             }

           }
           catch(Exception $e)
           {
              // dump($e->getMessage());
               $res['message']=$e->getMessage();
               return $res;

           }
    }

   

   public function searchPrice($minval,$maxval)
    {
     
      $products;
      $result;
      $min=0;
      $max=0;
      try
      {
             
        $min=$minval* 100; //converting to paise
        $max=$maxval * 100;
      
        $products = Product::with(['variations.stock','categories',
                          'rating','variations.type', 'users'])->where('status',1)->withScopes($this->scopes());
          if(($min==0 || $min>0) && ($max!=0) )
          {

                 $result=$products->whereBetween('price',[$min,$max])->paginate(10);
               
          }
          else{
           
            // $products = $products->paginate(10); 
            // $result=$products;  
             $result=$products->where('price','>=',$max)->paginate(10);
           
          }
         

             return ProductIndexResource::collection(
                $result
            );

         

      }
      catch(Exception $e)
      {
        //dd($e->getMessage());
      }
      
    }


    public function categoryPriceSearch(Request $request,$minval,$maxval)
    {

      $products;
      $result;
      $min=0;
      $max=0;
      try
      {
             
        $min=$minval* 100; //converting to paise
        $max=$maxval * 100;
      
        
        $productids=CategoryProduct::where('category_id',$request->categoryid)->pluck('product_id')->toArray();

        $products = Product::with(['variations.stock','categories',
                          'rating','variations.type', 'users'])->where('status',1)->whereIn('id',$productids);


          if(($min==0 || $min>0) && ($max!=0) )
          {
                $productids=array();
                 $result=$products->whereBetween('price',[$min,$max]);
          }
          else{
           
              $result=$products->where('price','>=',$max);
           
          }

             return ProductIndexResource::collection(
                $result->paginate(10)
            );

         

      }
      catch(Exception $e)
      {
         
      }
      
    }

    public function searchBrand($searchBrand)
    {

      $products = Product::with(['variations.stock','categories','rating',
                    'variations.type','users'])->where('status',1)->where('brand',$searchBrand)->withScopes($this->scopes())->paginate(10);
     
      return ProductIndexResource::collection(
          $products
      );
    }

    // public function searchBrand($searchBrand)
    // {
    //   $products;
    //   $search = $request->search;

    //   $products = Product::with(['variations.stock','categories','rating',
    //                 'variations.type','users'])->where('status',1)->withScopes($this->scopes());
    //   if($searchBrand!="" || $searchBrand!=null)
    //   {
    //       if($search!='' && $search!=null){
    //          $products = $products->where(function($query) use($searchBrand){
    //                      $query->where('user_id',$searchBrand);
    //                     })->paginate(10);
    //       }
    //       else{
    //         $products =$products ->where(function($query) use($searchBrand){
    //                     $query->where('user_id',$searchBrand);
    //                    })->where(function($query) use($search){
    //                   $query->where('description','LIKE','%' . $search . '%')
    //                  ->orwhere('name','LIKE','%' . $search . '%')
    //                 ->orwhere('slug','LIKE','%' . $search . '%');
    //               })->paginate(10);
                   
    //       }
            
    //   }
    //   else{
    //     $products = Product::with(['variations.stock','categories',
    //       'rating','variations.type','users'])->where('status',1)->withScopes($this->scopes())->paginate(10);
    //   }
       

    //      return ProductIndexResource::collection(
    //         $products
    //     );
    // }

     public function ratingfilter($rating)
    {


       $products=Product::with(['variations.stock','categories','users'
      ,'rating','variations.type'])->where('status',1)->withScopes($this->scopes())->where('ratings','>=',$rating)->paginate(10); 
           

      
      //  $product_id=RatingReview::where('rating','=',$rating)->pluck('entity_id')
      //                                                  ->toArray();
      // $products=Product::with(['variations.stock','categories','users'
      //   ,'rating','variations.type'])->withScopes($this->scopes())
           
      //   ->whereIn('id',$product_id)->paginate(10);

     
   
        return ProductIndexResource::collection($products);
    }

    public function categoryProductRatingFilter(Request $request,$rating)
    {
        
       $productids=CategoryProduct::where('category_id',$request->categoryid)->pluck('product_id')->toArray();
      
        $products=Product::with(['variations.stock','categories','users'
      ,'rating','variations.type'])->where('status',1)->whereIn('id',$productids)->withScopes($this->scopes())->where('ratings','>=',$rating)->paginate(10);

      return ProductIndexResource::collection($products);
    }

    public function categoryProductBrandFilter(Request $request,$brand)
    {        
        // dd($request->categoryid);
       $productids=CategoryProduct::where('category_id',$request->categoryid)->pluck('product_id')->toArray();

      
       
        $products=Product::with(['variations.stock','categories','users'
      ,'rating','variations.type'])->where('status',1)->whereIn('id',$productids)->withScopes($this->scopes())->where('brand',$brand)->paginate(10);
     
      return ProductIndexResource::collection($products);
    }

     public function highpricefilter()
    {
      
     $products = Product::with(['variations.stock','categories',
                          'rating','variations.type', 'users'])->where('status',1)->withScopes($this->scopes());
       $products=$products->pricedescending()->paginate(10); 
    
      return ProductIndexResource::collection($products);

    } 
    public function getlowpricefilter()
    {
        
       $products = Product::with(['variations.stock','categories',
                          'rating','variations.type', 'users'])->where('status',1)->withScopes($this->scopes());
       $products=$products->priceascending()->paginate(10);
                
        return ProductIndexResource::collection($products);

    } 

     protected function scopes()
    {
        return [
            'category' => new CategoryScope()
        ];
    }
  
}
