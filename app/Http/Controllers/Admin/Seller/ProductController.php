<?php

namespace App\Http\Controllers\Admin\Seller;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductGallery;
use App\Models\RatingReview;

class ProductController extends Controller
{
   public function getProduct($id)
  {
     $product=Product::where('id',$id)->first();

     return $product->status;
  }

  public function productStatusUpdate(Request $request,$id)
  {
     
   $product=Product::where('id',$id)->first();

   $product->status=$request->status;
 //    // dd($request->status);
   $product->save();
   
   return $response['messages']='successfully updated';


  }

    public function product($id,Request $request)
    {
     
        $paginate=$request->paginate==null?'10':$request->paginate;
        $orderby=$request->sort_by==null?'asc':$request->sort_by;

            $preuser=User::PreUser($id,3)->first();
            $nextuser=User::NextUser($id,3)->first();

         $user=User::with('defaultAddress')->where('id',$id)->first(); 

          $products=Product::with('productgallery','stores','variations')->where('user_id',$id);

         
          $search=$request->search;
          if($search!="")
          {

                $products=$products->where(function($query) use ($search){
                    $query->orWhere('status',$search)
                    ->orWhere('id',$search)
                    ->orWhere('name','LIKE',$search.'%')
                    ->orwhereHas('stores',function($q) use($search){
                         $q->Where('name','LIKE',$search.'%');
                 })->orwhereHas('variations',function($q) use($search){
                         $q->Where('name','LIKE',$search.'%');
                 });
                });
          }

          $products=$products->orderby('id',$orderby)->paginate($paginate);

                $products=$products->appends(array('sort_by' =>request('sort_by'),
                                 'paginate'=>request('paginate'),
                                 'search'=>request('search'),
                               ));
         
        return view('admin.seller.product',[
            'user'=>$user,
            'preuser'=>$preuser,
            'nextuser'=>$nextuser,
            'products'=>$products,

        ]);
    }


    public function delProduct($id)
    {
       
         \DB::beginTransaction();
     try{
           ProductGallery::where('product_id',$id)->delete();
           Product::where('id',$id)->delete();
           RatingReview::where('entity_id',$id)->delete();
            // TaxType::where('product_id',$id)->delete();
           \DB::commit();
        return redirect()->back()->with(['success'=>'Successfully deleted']);     
        }
    catch(Exception $e)
          {
            \DB::rollBack();
            dd($e->getMessage());
          }  
    }


}
