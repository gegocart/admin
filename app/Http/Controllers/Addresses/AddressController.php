<?php

namespace App\Http\Controllers\Addresses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Addresses\AddressStoreRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use App\Traits\Common;
use App\Traits\LogActivity;
use Exception;
class AddressController extends Controller
{   
  use Common,LogActivity;
  
    public function __construct()
    {
       $this->middleware(['auth:api']);
    }

    public function index(Request $request)
    { 
     
        $address=Address::with('user')->where('user_id',Auth::id())->get();

       return AddressResource::collection($address)->keyby('id');
     /*   return AddressResource::collection(
          $request->user()->addresses
        );*/
    }
     public function getdefaultaddress(Request $request)
    {
        $address=Address::where('user_id',Auth::id())->where('default',1)->get();
            
       return AddressResource::collection(
            $address
        );
  
    }


    public function store(AddressStoreRequest $request)
    {

      $res=[];

      if($request->default==true)
      {
        Address::where('user_id',Auth::id())->update(['default'=>false]);
      }

        // $address = Address::make($request->only([
        //     'name','firstname','lastname', 'address_1','address_2', 'city_id', 
        //     'state_id', 'postal_code', 'country_id', 'default'
        // ]));


        $user=User::where('id',Auth::id())->first();

         $address=new Address;
         $address->name=$request->name;
         $address->user_id=Auth::id();
          $address->firstname=$request->firstname;
          $address->lastname=$request->lastname;
          $address->address_1=$request->address_1;
          $address->address_2=$request->address_2;
          $address->city_id=$request->city;
          $address->state_id=$request->state;
          //$address->email=$user->email;
          $address->mobileno=$request->mobileno;
          $address->postal_code=$request->postal_code;
          $address->country_id=$request->country_id;
          $address->default=$request->default;
          $address->save();

          //$res['message']='Address Saved Successfully.';
          
//'email','mobileno',
        $request->user()->addresses()->save($address);
         try{
              $ip = $this->getRequestIP();
              $this->doActivityLog(                                    
                $address,
                Auth::user(),
                ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
                'LOGNAME_ADDRESS_STORED',
                'Address Stored'
              );

           }
          catch(Exception $e)
                {
                   
                  //dd($e->getMessage());
                }

           return response()->json(['success'=>true,'message'=>'Address Saved Successfully'],200);    
        //return new AddressResource($address);
    }

   /* public function show($user_id)
    {
      $address=Address::where('user_id',Auth::id())->where('default',1)->get();
            
       return AddressResource::collection(
            $address
        );
    }*/


     public function getAddress($id)
    {
      $address=Address::with('country')->where('user_id',Auth::id())->where('id',$id)->first();
            
       return [
            'id' => $address->id,
            'name' => $address->name,
            'address_1' => $address->address_1,
            'address_2' => $address->address_2,
            'city' => $address->city,
            'state' => $address->state,
            'email' => $address->user->email,
            'mobileno' => $address->mobileno,
            'postal_code' => $address->postal_code,
            'country' => $address->country->name,
            'default' => $address->default
       ];

    }

  
    public function edit($id)
    {
         $address=Address::where('id',$id)->first();
          if(is_null($address))
       {
          return response()->json(['error'=>422,'message'=>'Unprocessable Entity'],422);
       }
       elseif(auth()->user()->id!=$address->user_id){
          return response()->json(['error'=>403,'message'=>'Forbidden'],403);
       }


          
         return new AddressResource(
            $address
        );
    }

    public function update(AddressStoreRequest $request,$id)
    {
      $res=[];
      try
      {
          $address=Address::find($id);
          if(is_null($address))
         {
            return response()->json(['error'=>422,'message'=>'Unprocessable Entity'],422);
         }
         elseif(auth()->user()->id!=$address->user_id){
            return response()->json(['error'=>403,'message'=>'Forbidden'],403);
         }
        else{
          $user=User::where('id',Auth::id())->first();
          $address->name=$request->name;
          $address->firstname=$request->firstname;
          $address->lastname=$request->lastname;
          $address->address_1=$request->address_1;
          $address->address_2=$request->address_2;
          $address->city_id=$request->city;
          $address->state_id=$request->state;
         // $address->email=$user->email;
          $address->mobileno=$request->mobileno;
          $address->postal_code=$request->postal_code;
          $address->country_id=$request->country_id;
          if($request->via!='delivery')
          {
             $address->default=$request->default;
          }

          $address->save();
           try{
                $ip = $this->getRequestIP();
                $this->doActivityLog(                                    
                  $address,
                  Auth::user(),
                  ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
                  'LOGNAME_ADDRESS_UPDATED',
                  'Address Updated'
                );

             }
            catch(Exception $e)
                  {
                     
                    //dd($e->getMessage());
                  }

           return response()->json(['success'=>true,'message'=>'Updated Successfully'],200);
         }
         /* $res['message']="Updated Successfully";
          return $res;*/
      }
      catch(Exception $e)
      {
         $res['message']=$e->getMessage();
        

        if(str_contains($e->getMessage(),'Integrity constraint violation: 1062 Duplicate entry'))
          {
            $res['message']='Duplicate entry';
          }
           return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
     //   return $res;
      }
    }

    public function destroy($id)
    {
       Address::where('id',$id)->delete();

       return response()->json(['success'=>true,'message'=>'Deleted Successfully'],200);
    }
}
