<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Auth;
use File;
use App\Traits\Common;
use App\Traits\LogActivity;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Mail; 
use App\Http\Resources\SellerResource;
use App\Http\Resources\SellerProfileResource;
use Exception;

class UserController extends Controller
{  use Common,LogActivity;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::where('id',Auth::id())->first();
        return $users;
    }

    public function sellerdetail()
    {
         $sellers=User::with('sellerprofile')->where('id',Auth::id())->first();
       return new SellerResource($sellers);
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
    public function store(Request $request)
    {
        //
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
    public function update(EditUserRequest $request)
    {
         
        $res=[];
        try
        {
         if(User::where('name',$request->name)->where('id','!=',$request->id)->first())
          {
            return response()->json(['success'=>false,'message'=>'Name Already Exists.'],200);
                 
          }

          if(User::where('email',$request->email)->where('id','!=',$request->id)->first())
          {
            return response()->json(['success'=>false,'message'=>'Email Already Exists.'],200);
                 
          }

            $user=User::where('id',$request->id)->first();
            $user->name=$request->name;
            

            if($user->email!=$request->email)
            {
                $user->email_verified_at=null;   
                $user->token=sha1(time());
            }
            
            

            $user->email=$request->email;

           
           
            if($request->image!="null")
                { 
                    //$user =User::where('id',Auth::id())->first();
                    if($user->image!="")
                    {
                        $oldimage=$user->image;
                        File::delete('profile/'.$user->image);
                    }
                    $imageName = $user->name.time().'.'.request()->image->getClientOriginalExtension();
                    request()->image->move(public_path('profile'), $imageName);
                    $user->image = 'profile/'.$imageName;
                   // $user->save();    
                }
             $user->save();

              if($user->email_verified_at==null)
              {
                Mail::to($user->email)->queue(new VerifyMail($user));   
              }

                   try{
                        $ip = $this->getRequestIP();
                        $this->doActivityLog(                                    
                          $user,
                          Auth::user(),
                          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
                          'LOGNAME_USER_PROFILE_UPDATED',
                          'User Profile Updated'
                        );

                     }
                    catch(Exception $e)
                          {
                             
                            //dd($e->getMessage());
                          }
            
        return response()->json(['success'=>true,'message'=>'Profile Updated Successfully.'],200);
      }
        catch(Exception $e)
        {
          return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
