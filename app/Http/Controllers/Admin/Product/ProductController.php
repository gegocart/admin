<?php

namespace App\Http\Controllers\Admin\Product;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\Product\ProductFeaturedRequest;

 
use App\Models\Product;
use App\Models\ProductFeatured;
use App\Models\User;
use App\Models\RatingReview;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
  public function getProduct($id)
  {
   
     $product=Product::where('id',$id)->first();

     return $product->status;
  }

  public function statusUpdate(Request $request,$id)
  {
     
   $product=Product::where('id',$id)->first();

   $product->status=$request->status;
 //    // dd($request->status);
   $product->save();
   
   return $response['messages']='successfully updated';


  }
   public function index(Request $request)
    {
     
        $paginate=$request->paginate==null?'10':$request->paginate;
        $orderby=$request->sort_by==null?'asc':$request->sort_by;
          

         
          $products=Product::with('productgallery','stores','productfeatured');

          $featured=$request->featured;
          if($featured!="")
          {
         $featured=ProductFeatured::pluck('product_id')->toarray();
                

                $products=$products->whereIn('id',$featured);
               //dd($products);
          }

          $search=$request->search;
          if($search!="")
          {

                $products=$products->where(function($query) use ($search){
                    $query->orWhere('id',$search)
                    ->orWhere('name','LIKE',$search.'%')
                    ->orwhereHas('stores',function($q) use($search){
                         $q->Where('name','LIKE',$search.'%');
                 });
                 });

                // dd($products->get());
               
          }



          $products=$products->orderby('id',$orderby)->paginate($paginate);

         $products=$products->appends(array('sort_by' =>request('sort_by'),
                                 'paginate'=>request('paginate'),
                                 'search'=>request('search'),
                               ));
        return view('admin.product.list',[
            
            'products'=>$products,

        ]);
    }

    // public function pending()
    // {  
    //      $pending=Product::with('users','stores')->where('status','pending')->paginate(10);
    //      return view('admin.product.pendinglist',['pending'=>$pending]);
      
    // }
    // public function approve()
    // {  
    //      $approve=Product::with('users','stores')->where('status','approve')->paginate(10);
    //      return view('admin.product.approvelist',['approve'=>$approve]);
      
    // }public function cancel()
    // {  
           
    //      $cancel=Product::with('users','stores')->where('status','cancel')->paginate(10);
    //      return view('admin.product.cancellist',['cancel'=>$cancel]);
    // }
    
      public function description($slug)
    {  
      
      $product=Product::with('users','productgallery','stores','rating')->where('slug',$slug)->first();
         
         $rating=$product->starrating();
         $price=$product->price->formatted();

         return view('admin.product.description',[
            'product'=>$product,
            'rating' =>$rating,
            'price' =>$price
        ]);
      
    }
     public function featuredproduct($slug)
    {  
  //dd($id);
          $product=Product::where('slug',$slug)->first();
         return view('admin.product.featuredproduct',['product'=>$product]);
      
    }
     public function updatefeaturedproducts(ProductFeaturedRequest $request)
    {  
       $arr=$request->jsarray;

    // $id=$arr[0];
      $id=$arr;


$pieces = explode(",", $id);
   // dd($pieces);

$count=count($pieces);

for($i=0;$i<$count;$i++)
{ 
  $product=Product::where('id',$pieces[$i])->first();
   
    $check=ProductFeatured::where('product_id',$pieces[$i])->first();
   
    if($check==null)
    {
       $featured=New ProductFeatured;
         $featured->product_id=$product->id;
         $featured->featured_start_datetime=$request->startdate;
         $featured->featured_end_datetime=$request->enddate;
         $featured->save();
     }
     else
     {

         $featured=ProductFeatured::where('id',$check->id)->first();
         $featured->product_id=$product->id;
         $featured->featured_start_datetime=$request->startdate;
         $featured->featured_end_datetime=$request->enddate;
         $featured->save();

         // dd($featured);
     }
 }
       // return redirect('admin/product')->with('Saved Succesfully');

   return response()->json(['success'=>'Add as Featured Successfully']);
  
      
    }
    public function orders($slug)
    {  
   
         $product=Product::with('users','productgallery','stores','rating','orderitem')->where('slug',$slug)->first();
               
          $rating=$product->starrating();          
         // dd($deliverydate);
         return view('admin.product.orders',[
            'product'=>$product,
            'rating'=>$rating,
        ]);
      
    }
    public function reviews($slug)
    {  
         
         $product=Product::with('users','productgallery','stores','rating')->where('slug',$slug)->first();
         $rating=$product->starrating();
        
         return view('admin.product.reviews',[
            'product'=>$product,
            'rating'=>$rating,
        ]);     
    }

}
