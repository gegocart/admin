<?php

namespace App\Http\Controllers\Cart;

use App\Cart\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartStoreRequest;
use App\Http\Requests\Cart\CartUpdateRequest;
use App\Http\Resources\Cart\CartResource;
use App\Models\ProductVariation;
use App\Models\CartUser;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Auth;

class CartController extends Controller
{
    public function __construct()
    {
       $this->middleware(['auth:api']);
    }

    public function index(Request $request, Cart $cart)
    {

        $res=[];
      
        try
          {
            
        $cart->sync();
        
        $request->user()->load([
            'cart.product', 'cart.product.variations.stock', 'cart.stock', 'cart.type'
        ]);

    

        return (new CartResource($request->user()))
            ->additional([
                'meta' => $this->meta($cart, $request)
            ]);
        }
        catch(Exception $e)
        {
           // dd($e->getMessage());
            $res['message']=$e->getMessage();

        }
    }

    protected function meta(Cart $cart, Request $request)
    {
        
         return [
            'empty' => $cart->isEmpty(),
            'design'=>$cart->cardDesign(),
            'subtotal' => $cart->subtotal()->formatted(),
           // 'total' => $cart->withShipping($request->shipping_method_id)->total()->formatted(),
            'total' => $cart->withShipping($request->shipping_method_id)->total(),
            'changed' => $cart->hasChanged(),
            'itemtaxrate'=>$cart->itemtaxrate()->formatted(),
            'taxrate'=>$cart->taxrate(),
            'shippingtaxrate'=>$cart->withShipping($request->shipping_method_id)->shippingtaxrate()->formatted(),
            'shippingtotal'=>$cart->withShipping($request->shipping_method_id)->shippingtotal()->formatted(),
            'currency'=>$cart->getCurrency(),
            'cardimage'=>$cart->card_image(),
            
        ];
    }

    public function store(CartStoreRequest $request, Cart $cart)
    {
      try
      {
        foreach ($request->products as $key => $value) {
           if($value['card_type']=='giftcard')
            {
               /* $user=User::find(Auth::id());
                $cartuser=$user->cart()->where('product_variation_id',$value['id'])
                                  ->where('to_email',$value['to_email'])->first();

                if(count($cartuser)>0){
                   
                    $finalqty=$cartuser->pivot->quantity + $value['quantity'];
                    $user->cart()->updateExistingPivot($value['id'], [
                            'quantity' => $finalqty
                        ]);
                  
                }
                else{*/
                   $this->giftcard_add($value);
               // }
              
            }
            else{
               $cart->add($request->products);
            }
        }
        
      }
      catch(Exception $e)
      {
        return response()->json(['success'=>false,'message'=>$e->getMessage()],422);
      }
       
    }

    public function update(ProductVariation $productVariation, CartUpdateRequest $request, 
        Cart $cart)
    {
        //dd($cart->mailmessage()->path);
        $cart->update($productVariation->id, $request->quantity);
    }

    public function destroy(ProductVariation $productVariation, Cart $cart)
    {
        $cart->delete($productVariation->id);
    }


    public function giftcard_add($value)
    {
        try
        {
            $cartuser=new CartUser();
            $cartuser->user_id=Auth::id();
            $cartuser->product_variation_id=$value['id'];
            $cartuser->quantity=$value['quantity'] + $getquantity;
            $cartuser->to_email=$value['to_email'];
            $cartuser->from_mail=$value['from_mail'];
            $cartuser->message=$value['message'];
            $cartuser->card_image=$value['card_image'];
            $cartuser->save();
        }
        catch(Exception $e)
        {
          // dump($e->getMessage());
        }

    }
}
