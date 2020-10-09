<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Mail;
use App\Traits\Common;
use App\Traits\LogActivity;
use Auth;
use Exception;
use App\Mail\ResetPassword;
use App\Http\Requests\Auth\ResetPasswordEmailRequest;
use App\Http\Requests\SellerResetPasswordRequest;
use App\Mail\ChangePassword;
use App\Models\Mailtemplate;

class ForgotPasswordController extends Controller
{
    use Common,LogActivity;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }


    public function resetpassword(ResetPasswordEmailRequest $request) 
    {   
        $res=[];
       $user = User::where('email', $request->email)->where('usergroup_id',$request->usergroup_id)->first();
        
        if($user==null)
        {
          $res['failure']='Email does not exist'; 
          return $res; 
        }

             $mailtemplate = Mailtemplate::where('name','reset_passsword')->first();
            if($mailtemplate->status!='active')
            {
               $res['failure']='This feature has been stoped by administration team'; 
                 return $res; 
            }
        $token = str_random(64);

        $user->password=Hash::make($token);       

        if($user->save()) 
        {
          
                 Mail::to($user->email)->send(new ResetPassword($user, $token));
             
             \Session::put('successmessage',__('admin_user.user_password_reset')); 
        } 
        else 
        {
                        \Session::put('successmessage',__('admin_user.user_password_plsreset')); 
        }  
       try{
                $ip = $this->getRequestIP();
                    $this->doActivityLog(                                    
                      $user,
                      Auth::user(),
                      ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']], 
                      'LOGNAME_RESET_PASSWORD',
                      'Reset Password'
                    );

         }
        catch(Exception $e)
          {
             
            //dd($e->getMessage());
          }      
         $res['message']='Email send successfully.Please check your email.';
         return $res;
    }

   public function sellerResetPassword(ResetPasswordEmailRequest $request)
    {
       $res=[];
       $user = User::where('email', $request->email)->where('usergroup_id',$request->usergroup_id)->first();
        
        if($user==null)
        {
          $res['failure']='Email does not exist'; 
          return $res; 
        }
            $mailtemplate = Mailtemplate::where('name','reset_passsword')->first();
            if($mailtemplate->status!='active')
            {
               $res['failure']='This feature has been stoped by administration team'; 
                 return $res; 
            }
        $token = str_random(64);

        $user->password=Hash::make($token);       

        if($user->save()) 
        {


            Mail::to($user->email)->send(new ResetPassword($user, $token));
            
             \Session::put('successmessage',__('admin_user.user_password_reset')); 
        } 
        else 
        {
                        \Session::put('successmessage',__('admin_user.user_password_plsreset')); 
        }  
       try{
                $ip = $this->getRequestIP();
                    $this->doActivityLog(                                    
                      $user,
                      Auth::user(),
                      ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']], 
                      'LOGNAME_RESET_PASSWORD',
                      'Reset Password'
                    );

         }
        catch(Exception $e)
          {
             
            //dd($e->getMessage());
          }      
         $res['message']='Email send successfully.Please check your email.';
         return $res;
    }


    // public function sellerResetPassword(SellerResetPasswordRequest $request)
    // {
    //     $res=[];

    //     $email=$request->email;

    //      $user=User::where('email',$email)->first();

    //      $hashedPassword = $user->password;

        
    //       $user->password=Hash::make($request->password);
    //       $user->save();

    //       Mail::to($user->email)->queue(new ChangePassword($user));



    //       try{
    //             $ip = $this->getRequestIP();
    //             $this->doActivityLog(                                    
    //               $user,
    //               Auth::user(),
    //               ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
    //               'LOGNAME_PASSWORD_UPDATED',
    //               'Password Updated'
    //             );

    //          }
    //         catch(Exception $e)
    //         {
               
    //          //ssdd($e->getMessage());
    //         } 
    //       $res['message']="Password is changed successfully";
        
    //     return $res;
    // }


     
}
