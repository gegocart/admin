<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductIndexResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Scoping\Scopes\CategoryScope;
use Illuminate\Http\Request;
use App\Traits\ProductDelete_Process;
use App\Models\OrderItem;
use App\Models\Order;
use Auth;
use Illuminate\Support\Facades\Response;
use App\Models\ProductSource;

class ProductController extends Controller
{
    use ProductDelete_Process;


    public function getAuthName()
    {
      return Auth::user()->name;
    }

    public function download(Request $request,$id)
    {
      // $orderItem=OrderItem::where('id',$request->produtItemId)->first();
      // $orderSouce=ProductSource::where('product_id',$orderItem->product_id)->first();

      $orderItem=OrderItem::where('id',$id)->first();

      $order=Order::where('id',$orderItem->order_id)->first();

      if($order->status==='completed')
      {

      $orderSouce=ProductSource::where('product_id',$orderItem->product_id)->first();


     $file= public_path().'/uploads/'. $orderSouce->source;

      $headers = array(
              'Content-Type: application/pdf',
            );

       // dd(Response::download($file, str_random(32).'.pdf', $headers));

     return Response::download($file, str_random(32).'.pdf', $headers);
    }

     return redirect()->back();

    }


    public function myproducts(Request $request)
    {

        $show=(int)$request->show;
        if($show!=0){
          $products = Product::where('user_id',auth()->user()->id)->paginate($show); //->where('status', 1)
        }
        else{
          $products = Product::where('user_id',auth()->user()->id)->paginate(15); //->where('status', 1)
        }

     //   $stores = Store::where('user_id',$userid)->paginate(15); //->where('status', 1)
       // $stores = Store::where('user_id',Auth::id())->paginate(15); //->where('status', 1)
        return ProductIndexResource::collection($products);
    }

    public function index(Request $request) //products  //buyer
    {
        // $products = Product::with(['variations.stock'])->withScopes($this->scopes())->paginate(10); //previous
       $user=User::where('usergroup_id',3)->where('status',1)->pluck('id')->toArray();


        $products = Product::with(['variations.stock','users','categories',
          'rating','variations.type'])->where('status',1)
           ->whereIn('user_id',$user)->withScopes($this->scopes());

         $search = $request->search;

         if($search!="" || $search!=null)
         {

              $products=$products->where(function($query) use($search){
                    $query->where('description','LIKE','%' . $search . '%')
                     ->orwhere('name','LIKE','%' . $search . '%')
                    ->orwhere('slug','LIKE','%' . $search . '%');
                    //->orwhere('description','LIKE','%' . $search . '%');
              });



         }

            $products=$products->paginate(10);
              return ProductIndexResource::collection(
                $products
            );
    }

   public function show(Product $product) ///products/slug //buyer
    {


          if(is_null($product))
         {
                return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
         }
         else
         {

         $product->load(['variations.type', 'variations.stock',
            'variations.product','attributeproduct']);
        //return $product;
          return new ProductResource(
              $product
          );
      }
    }

    protected function scopes()
    {
        return [
            'category' => new CategoryScope()
        ];
    }

    public function destroy($id)
    {
      $res=[];
        try {

           $product=Product::where('id',$id)->first();
           $productid=$product->where('id',$id)->pluck('id')->toArray();

           if(is_null($product))
           {
              return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
            }
           elseif(auth()->user()->id!=$product->user_id){
                return response()->json(['success'=>false,'message'=>'Forbidden'],403);
               }

           else
           {

               //$this->deleteReviewRating($productid);

               $this->deleteProductGallery($productid);
               $this->deleteProductVariation($productid);
               $this->deleteAttributeProduct($productid);
              $this->deleteProduct($productid);
               return response()->json(['success'=>true,'message'=>'Deleted Successfully'],200);

             }
        }
        catch (Exception $e)
        {
            return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
        }

    }

}
