<?php
namespace App\Http\Controllers\Admin\Seller;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\OrderItem;


class StoreController extends Controller
{
 
     public function storeList($id,Request $request)
    {
        // dd($request);

       $paginate=$request->paginate==null?'10':$request->paginate;
        $orderby=$request->sort_by==null?'asc':$request->sort_by;


           $preuser=User::PreUser($id,3)->first();
            $nextuser=User::NextUser($id,3)->first();
      
     $user=User::with('defaultAddress','mystores')->where('id',$id)->first(); 
     
     $search=$request->search;
     $stores=Store::where('user_id',$id);


     if($search!="")
     { 
        $stores=$stores->where(function($query) use ($search){
            $query->orWhere('id',$search)->orWhere('name','LIKE',$search.'%')->orWhere('status','LIKE',$search);   
        });
        
     }
     $stores=$stores->orderby('id',$orderby)->paginate($paginate);
       $stores=$stores->appends(array('sort_by' =>request('sort_by'),
                                 'paginate'=>request('paginate'),
                                 'search'=>request('search'),
                               ));
        return view('admin.seller.store',[
            'user'=>$user,
            'preuser'=>$preuser,
            'nextuser'=>$nextuser,
            'stores'=>$stores
        ])->withQuery($paginate);
    }



    public function delStore($id)
    {

     \DB::beginTransaction();
     try{
          $productid=Product::where('store_id',$id)->pluck('id')->toArray();

          ProductGallery::whereIn('product_id',$productid)->delete();
          Product::where('store_id',$id)->delete();
          // Transaction::where('user_id',$id)->delete();
           Store::where('id',$id)->delete();

            
          \DB::commit();
        }
    catch(Exception $e)
          {
            \DB::rollBack();
        // dd($e->getMessage());
          }  
           return redirect()->back()->with(['success'=>'Successfully deleted']);

    }



}
