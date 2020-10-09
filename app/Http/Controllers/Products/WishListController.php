<?php

namespace App\Http\Controllers\Products;
use App\Http\Controllers\Controller;
use App\Http\Resources\WishListResource;
use Illuminate\Http\Request;
use App\Models\WishList;
use App\Models\WishListItem;
use App\Http\Requests\Product\AddWishListRequest;
use App\Http\Requests\Product\WishLisRenameRequest;
use Auth;
// use Illuminate\Support\Facades\Auth;
class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
   {    

        $wishlist=WishList::where('user_id',Auth::id())->get();
         return WishListResource::collection($wishlist);
    }

    public function getwishlist()
    {
        
         $wishlist=WishList::where('user_id',Auth::id())->get();
         return WishListResource::collection($wishlist);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddWishListRequest $request)
    { 
  // dd(Auth::id());
   \DB::beginTransaction();
   try{

         $wishList=new WishList;
         $wishList->name=$request->name;
         $wishList->user_id=Auth::id();
         $wishList->save();

         $wishListItem=new WishListItem;
         $wishListItem->user_id=Auth::id();
         $wishListItem->wishlist_id=$wishList->id;
         $wishListItem->product_id=$request->product_id;
         $wishListItem->save();

      \DB::commit();
       }
    catch(Exception $e)
          {
            \DB::rollBack();
          dd($e->getMessage());
          }  
         return response()->json(['success'=>true,'message'=>'Add wishlist successfully'],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WishLisRenameRequest $request)
    {       
   
         $wishList=WishList::where('id',$request->id)->first();
        
         $wishList->name=$request->rename;
         $wishList->user_id=Auth::id();
         $wishList->save();
          
         return response()->json(['success'=>true,'message'=>'Add wishlist Updated successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         \DB::beginTransaction();
     try{
         
         WishListItem::where('wishlist_id',$id)->where('user_id',Auth::id())->delete();
         WishList::where('id',$id)->delete();       

             \DB::commit();
             return response()->json(['success'=>true,'message'=>'The wishlist deleted successfully'],200);
         }
    catch(Exception $e)
          {
            \DB::rollBack();
            dd($e->getMessage());
          }  
   
    }


}
