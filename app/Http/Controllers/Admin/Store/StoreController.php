<?php

namespace App\Http\Controllers\Admin\Store;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Store;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class StoreController extends Controller
{
    public function index(Request $request)
    {

       $paginate=$request->paginate==null?'10':$request->paginate;
        $orderby=$request->sort_by==null?'asc':$request->sort_by;

       $search=$request->search;
       $stores=Store::with('users')->orderby('id', $orderby)->paginate($paginate);
 

     if($search!="")
     { 
        $stores=Store::where(function($query) use ($search){
            $query->orWhere('id',$search)->orWhere('name','LIKE',$search.'%')->orWhere('status','LIKE',$search)->orwhereHas('users',function($q) use ($search){
                  $q->Where('name','LIKE',$search.'%');
            });  
        })->orderby('id', $orderby)->paginate($paginate);         
     }

     $stores=$stores->appends(array('sort_by' =>request('sort_by'),
                                 'paginate'=>request('paginate'),
                                 'search'=>request('search'),
                               ));
 
        return view('admin.store.list',[
            'stores'=>$stores,
        ]);
    }

    // public function pending()
    // {  
           
    //      $pending=Store::with('users')->where('status','pending')->paginate(10);
    //      return view('admin.store.pendinglist',['pending'=>$pending]);
      
    // }
    // public function approve()
    // {  
    //          $approve=Store::with('users')->where('status','approve')->paginate(10);
    //      return view('admin.store.approvelist',['approve'=>$approve]);
      
    // }
    // public function cancel()
    // {  
    //          $cancel=Store::with('users')->where('status','cancel')->paginate(10);
    //      return view('admin.store.cancellist',['cancel'=>$cancel]);
      
    // }
     public function profile($slug)
    {  
      // dd($slug);
             $store=Store::with('users')->where('slug',$slug)->first();
             $nextStore=$store->NextStore($store->id)->first();
             $preStore=$store->PreStore($store->id)->first();
            
         return view('admin.store.profile',[
            'store'=>$store,
            'nextStore'=>$nextStore,
            'preStore'=>$preStore,
        ]);
      
    }
    public function description($slug)
    {  
      // dd($slug);
          $store=Store::with('users')->where('slug',$slug)->first();
          $nextStore=$store->NextStore($store->id)->first();
          $preStore=$store->PreStore($store->id)->first();
         return view('admin.store.description',[
            'store'=>$store,
            'nextStore'=>$nextStore,
            'preStore'=>$preStore,
        ]);
      
    }
    public function seller($slug)
    {  
      // dd($slug);
       $store=Store::with('users')->where('slug',$slug)->first();
        
             $nextStore=$store->NextStore($store->id)->first();
             $preStore=$store->PreStore($store->id)->first();

         return view('admin.store.seller',[
            'store'=>$store,
            'nextStore'=>$nextStore,
            'preStore'=>$preStore,
        ]);
      
    }
   public function destroy($id)
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
