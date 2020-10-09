<?php

namespace App\Http\Controllers\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WishList;
use App\Models\WishListItem;
use App\Models\Product;
use App\Http\Requests\Product\AddWishItemRequest;
use App\Http\Resources\WishListResource;
use App\Http\Resources\WishItemResource;
use App\Http\Requests\Product\WishListItemMoveRequest;
use Auth;
class WishListItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function getmywishlistitem()
    // { 

    //      $wishListItem=WishListItem::with('wishlist','product')->where('user_id',Auth::id())->get();
    //     //dd($wishList);
    //     return WishItemResource::collection($wishListItem)->groupby('wishlist_id');
    // }

     // public function getmywishlistitem($id)
     // {
     //    $wishListItem=WishListItem::with('wishlist','product')->where('user_id',Auth::id())->where('id',$id)->get();
     //    //dd($wishList);
     //    return WishItemResource::collection($wishListItem);
     // }

    public function index(Request $request)
    {
         
        // $wishListItem=WishListItem::with('wishlist','product')->where('user_id',Auth::id())->paginate(4);
        // $search=$request->search;
        // if($search!="")
        // {
        //    $wishListItem=WishListItem::with('wishlist','product')->whereHas('product',function($q) use($search){
        //       $q->where('name','LIKE','%'.$search.'%');
        //    })->where('user_id',Auth::id())->paginate(4);    
        // }

         

        $wishListItem=WishListItem::with('wishlist','product')->where('user_id',Auth::id())->get();
        $search=$request->search;
        if($search!="")
        {
            if($request->wishlist_id!="")
            {
                $wishListItem=WishListItem::with('wishlist','product')->whereHas('product',function($q) use($search){
                       $q->where('name','LIKE','%'.$search.'%');
                  })->where('user_id',Auth::id())->where('wishlist_id',$request->wishlist_id)->get();    
            }
          else
            {             
                 $wishListItem=WishListItem::with('wishlist','product')->whereHas('product',function($q) use($search){
                       $q->where('name','LIKE','%'.$search.'%');
                 })->where('user_id',Auth::id())->get();
            }
           

        }
        return WishItemResource::collection($wishListItem)->groupby('wishlist_id');
       // $wishListItem=WishListItem::with('wishlist','product')->orWhere('kd');
    }

    public function getlowpriceproduct($sortby)
    {
       
         $wishproductid=WishListItem::where('user_id',Auth::id())->pluck('product_id')->toArray();     
          
     $productid=Product::with('wishlistitems')->whereIn('id',$wishproductid)->orderby('price',$sortby)->pluck('id')->toArray();
     $ids_ordered = implode(',', $productid);
        $wishitems=WishListItem::with('wishlist','product')->where('user_id',Auth::id())->whereIn('product_id',$productid)->orderByRaw("FIELD(product_id, $ids_ordered)")->get();
      
        return WishItemResource::collection($wishitems)->groupby('wishlist_id');
    }

    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddWishItemRequest $request)
    {    // dd($request->wishlist_id);
         $wishListItem=new WishListItem;
         $wishListItem->user_id=Auth::id();
         $wishListItem->wishlist_id=$request->wishlist_id;
         $wishListItem->product_id=$request->product_id;
         $wishListItem->save();    
         return response()->json(['success'=>true,'message'=>'Add wishlist successfully'],200);     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function move(WishListItemMoveRequest $request)
    {
         // dd(Auth::id());
        \DB::beginTransaction();
     try{
           WishListItem::where('user_id',Auth::id())->where('product_id',$request->product_id)->delete();
             $wishListItem=new WishListItem;
             $wishListItem->user_id=Auth::id();
             $wishListItem->wishlist_id=$request->wishlist_id;
             $wishListItem->product_id=$request->product_id;
             $wishListItem->save();
             \DB::commit();
           }
    catch(Exception $e)
          {
            \DB::rollBack();
           // dd($e->getMessage());
          }  
        
      
  // $wishlistitem= WishListItem::where('user_id',Auth::id())->where('product_id',$request->product_id)->first();
  //      $wishlistitem->wishlist_id=$request->wishlist_id;
  // $wishlistitem->save();
         return response()->json(['success'=>true,'message'=>'The product is move successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd(Auth::id());
        // $wishListItem=WishListItem::where('user_id',Auth::id())->where('wishlist_id',$id)->delete();
         $wishListItem=WishListItem::where('user_id',Auth::id())->where('id',$id)->delete();        
        return response()->json(['success'=>true,'message'=>'Wish list item remove successfully']);
    }
}
