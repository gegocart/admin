<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\Product;
use App\Models\ProductFeatured;
use Illuminate\Support\Facades\Auth;
use App\Traits\LogActivity;
use Carbon\Carbon;
use App\Http\Resources\ProductIndexResource;
use App\Models\ProductGallery;

class ProductFeatureController extends Controller
{
    public function featuredproduct(Request $request)
    {
   
       $segment=$request->segment;
     $daycheck=Carbon::now()->format('Y-m-d') ;
      // dd($daycheck);
     
     // $featured=ProductFeatured::where('featured_start_datetime','>=', $daycheck)->pluck('product_id')->toarray();
     
     $featured=ProductFeatured::where('featured_start_datetime','<=', $daycheck)->where('featured_end_datetime','>=', $daycheck)->pluck('product_id')->toarray();

      $products=Product::with(['variations.stock','categories','users','productfeatured'])->whereIn('id',$featured)->paginate(4);
                         // dd($products);
      return ProductIndexResource::collection($products);

    }

    public function delete_getProductGallery($id,$productid)
    {
      $res=[];
        try 
        {
           $productgallery=ProductGallery::where('id',$id)->delete();
           $productimage=ProductGallery::where('product_id',$productid)->get();
          
           return $productimage;
        }
        catch(Exception $e)
        {
            $res['message']=$e->getMessage();
            return $res;
        }
    }
}
