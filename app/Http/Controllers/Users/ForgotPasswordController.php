<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Http\Requests\Auth\ResetPasswordEmailRequest;
use Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Mail\ChangePassword;
use App\Traits\Common;
use App\Traits\LogActivity;
// use Auth;
use Exception;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;

use App\Models\Mailtemplate;


class ForgotPasswordController extends Controller
{  use Common,LogActivity;
   // ,SendsPasswordResetEmails

    public function __construct()
    {
       // $this->middleware('guest');
    }
     public function changepassword(Request $request)
    {
        
    }
 public function passwordupdate(Request $request)
    {



          $res=[];
        $id=$request->id;

        $user=User::find($id);
         $hashedPassword = $user->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) 
        {
          $user->password=Hash::make($request->newpassword);
          $user->save();
                 try{
                      $ip = $this->getRequestIP();
                      $this->doActivityLog(                                    
                        $user,
                        Auth::user(),
                        ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
                        'LOGNAME_PASSWORD_UPDATED',
                        'Password Updated'
                      );

                   }
                  catch(Exception $e)
                  {
                     
                   // dd($e->getMessage());
                  }
          Mail::to($user->email)->queue(new ChangePassword($user)); 
          $res['message']="Password is changed successfully";
        }
        else
        {
            $res['message']="Old Password is incorrect";

        }

        return $res;


    }

   public function store(ForgotPasswordRequest $request)
    {
       // dd(Auth::id());
        $res=[];
        $id=$request->id;

        $user=User::find($id);
         $hashedPassword = $user->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) 
        {
          $user->password=Hash::make($request->newpassword);
          $user->save();
            
          $mail = Mailtemplate::where('name','change_password')->first();
       
          if($mail->status=='active')
          {
            Mail::to($user->email)->queue(new ChangePassword($user));
          }



          try{
                $ip = $this->getRequestIP();
                $this->doActivityLog(                                    
                  $user,
                  Auth::user(),
                  ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
                  'LOGNAME_PASSWORD_UPDATED',
                  'Password Updated'
                );

             }
            catch(Exception $e)
            {
               
            //  dd($e->getMessage());
            } 
          $res['message']="Password is changed successfully";
        }
        else
        {
            $res['message']="Old Password is incorrect";

        }

        return $res;

    }


}
