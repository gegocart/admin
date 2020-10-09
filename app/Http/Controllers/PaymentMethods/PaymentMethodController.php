<?php

namespace App\Http\Controllers\PaymentMethods;

use App\Cart\Payments\Gateway;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentMethods\PaymentMethodStoreRequest;
use App\Http\Resources\PaymentMethodResource;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function __construct(Gateway $gateway)
    {
       $this->middleware(['auth:api']);
       // $this->gateway = $gateway;
    }
    
    public function index(Request $request)
    {
        return PaymentMethodResource::collection(
            $request->user()->paymentMethods
        );
    }

    public function storeold(PaymentMethodStoreRequest $request)
    {
        $card = $this->gateway->withUser($request->user())
            ->createCustomer()
            ->addCard($request->token);

        return new PaymentMethodResource($card);
    }


    public function store(Request $request)
    {
         $res=[];
      
        try
        {
          $paymentmethod=PaymentMethod::create($request->only('user_id','card_type',
                        'last_four','default','provider_id'));

        
          return new PaymentMethodResource($paymentmethod);
        }
        catch(Exception $e)
        {
            $res['message']=$e->getMessage();
            
            return $res;
        }
       
    }

    public function show()
    {
         $paymentmethod=PaymentMethod::where('is_active',true)->get();
          
            
       return PaymentMethodResource::collection(
            $paymentmethod
        )->keyby('gateway_name');
    }
}
