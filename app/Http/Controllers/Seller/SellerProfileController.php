<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SellerProfile;
use App\Models\User;
use Exception;
use App\Mail\RegisterNewUser;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Seller\SellerRegistrationRequest;
use App\Models\Mailtemplate;
use App\Traits\Common;
use App\Traits\LogActivity;
use Auth;
use App\Traits\MobileMSG91;
class SellerProfileController extends Controller
{
          use Common,LogActivity, MobileMSG91;
 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellerprofile=SellerProfile::get();
        return $sellerprofile;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SellerRegistrationRequest $request) //SellerRegistration
    {
        $res=[];
        //$no=91;
        try
        {
          
              $user=new User;
              $user->email=$request->email;
              $user->name=$request->name;
              $user->password=$request->password;
              $user->usergroup_id=3;
              $user->status=0;
              $user->token=sha1(time());
              $user->save();

            $sellerprofile=new SellerProfile;
            $sellerprofile->user_id=$user->id;
            $sellerprofile->seller_name=$request->name;
            $sellerprofile->mobileno=$request->mobileno;
            $sellerprofile->email=$request->email;
            $sellerprofile->company_name=$request->company_name;
            $sellerprofile->company_url=$request->company_url;
            $sellerprofile->aboutbusiness=$request->aboutbusiness;
            $sellerprofile->save();
     //$this->sendSMS('123456',$request->mobileno);
            $mailtemplate = Mailtemplate::where('name','register_new_user')->first(); 

       if($mailtemplate->status=='active')
       {
          Mail::to($user->email)->queue(new RegisterNewUser($user));
       }
             
       Mail::to($user->email)->queue(new VerifyMail($user)); 
 
   try{
        $ip = $this->getRequestIP();
        $this->doActivityLog(                                    
          $sellerprofile,
          Auth::user(),
          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
          'LOGNAME_SELLER_PROFILE_STORED',
          'Seller Profile Stored'
        );

     }
    catch(Exception $e)
  {  
    //dd($e->getMessage());
  }
     
        return response()->json(['success'=>true,'message'=>'Register Successfully'],200);
          
        }
        catch(Exception $e)
        {
            dump($e->getMessage());
           return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
        }

        
                  
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
        $sellers=User::with('sellerprofile')->first();
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
        //
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
