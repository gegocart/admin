<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\PrivateUserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\SellerProfile;
 use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Traits\LastUserActivityTrait;


use App\Traits\Common;
use App\Traits\LogActivity;
use Illuminate\Support\Facades\Auth;
   
use Carbon\Carbon;

class LoginController extends Controller
{ use LogActivity,Common,LastUserActivityTrait;
    public function action(LoginRequest $request)
    { 

        //if (!$token = auth()->attempt($request->only('email', 'password'))) {
         $credentials = $request->only('email', 'password');
        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'errors' => [
                    //'email' => ['Could not sign you in with those details.']
                    'email' => ['Invalid Email or Password.']
                ]
            ], 422);
        }

        return (new PrivateUserResource($request->user()))
            ->additional([
                'meta' => [
                    'token' => $token
                ]
            ]);
    }

     public function actionseller(LoginRequest $request)
    {

        //if (!$token = auth()->attempt($request->only('email', 'password'))) {
    
        $credentials = $request->only('email', 'password');

        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'errors' => [
                    //'email' => ['Could not sign you in with those details.']
                    'email' => ['Invalid Email or Password.']
                ]
            ], 422);
        }
       
        $sellerprofile=SellerProfile::where('user_id',$request->user()->id)->first();
        if($sellerprofile->status=='not_approved'){
            return response()->json([
                'errors' => [
                    'email' => ['Your Account has not approved.Wait for approval.']
                    ]
            ], 422);
        }
        if($request->user()->usergroup_id==3){


            $this->lastUserActivity(
               Auth::user() 
            );
             $ip= $this->getRequestIP();
         $this->doActivityLog(
                Auth::user(),
                Auth::user(),
                ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT'] ],
                'LOGNAME_LOGIN',
                'Logged In'
            );
        return (new PrivateUserResource($request->user()))
            ->additional([
                'meta' => [
                    'token' => $token
                ]
            ]);
        }
        else{
            return response()->json([
                'errors' => [
                    'email' => ['Could not sign you in with those details.']
                    ]
            ], 422);
        }


    }


    public function actionbuyer(LoginRequest $request)
    {
        
         $credentials = $request->only('email', 'password');

      
      //  if (!$token = auth()->attempt($request->only('email', 'password'))) {
          if (! $token = JWTAuth::attempt($credentials)) {
           
            return response()->json([
                'errors' => [
                    //'email' => ['Could not sign you in with those details.']
                    'email' => ['Invalid Email or Password.']
                ]
            ], 422);
        }

          $user=User::where('id',$request->user()->id)->first();
        if($user->status==0){


            return response()->json([
                'errors' => [
                    'email' => ['Your Account is deactivated.']
                    ]
            ], 422);
        }
        
        if($request->user()->usergroup_id==4){


            $this->lastUserActivity(
               Auth::user() 
            );

             $ip= $this->getRequestIP();
         $this->doActivityLog(
                Auth::user(),
                Auth::user(),
                ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT'] ],
                'LOGNAME_LOGIN',
                'Logged In'
            );
        return (new PrivateUserResource($request->user()))
            ->additional([
                'meta' => [
                    'token' => $token
                ]
            ]);
        }
        else{
            return response()->json([
                'errors' => [
                    'email' => ['Could not sign you in with those details.']
                    ]
            ], 422);
        }
    }
 
  

    public function showLoginForm()
    {
        //dd('ffghzzz');
        return view('auth/login');
    }

    public function update()
    {
        $user=User::where('id',Auth::id())->first();
        $user->login_status=0;
        $user->last_login_at=Carbon::now();
        $user->save();
    }

   


}
