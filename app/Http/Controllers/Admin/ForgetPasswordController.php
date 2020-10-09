<?php

 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
// use App\Http\Requests\Admin\AdminChangePasswordRequest;
use Illuminate\Support\Facades\Hash;
use Mail;
// use App\Mail\ChangePasswordMail;
use App\Traits\Common;
use App\Traits\LogActivity;
use Auth;
use Exception;
use App\Http\Requests\Auth\ResetPasswordEmailRequest;
use App\Mail\ResetPassword;
use App\Mail\VerificationForgetPasswordMail;

use App\Models\Mailtemplate;

class ForgetPasswordController extends Controller
{  use Common,LogActivity;
    
      public function create()
      {
       return view('admin.forgetpassword');
      }

     public function store(ResetPasswordEmailRequest $request)
    { 


    $mailtemplate = Mailtemplate::where('name','reset_passsword')->first();
   if($mailtemplate->status=='active')
   {

       $user = User::where('email', $request->email)->where('usergroup_id',1)->first();
        
        if($user==null)
        {
          return  redirect()->back()->with('error','Email does not exist.');
        }
       
         $user->token=sha1(time());
           
        if($user->save()) 
        {
              Mail::to($user->email)->queue(new VerificationForgetPasswordMail($user));  
            
             \Session::put('successmessage',__('admin_user.user_password_reset')); 
        } 
        else 
        {
                        \Session::put('successmessage',__('admin_user.user_password_plsreset')); 
        }  
          
 
         return  redirect()->back()->with('success','Email send successfully.Please check your email.');

         }  
        else
        {
          return  redirect()->back()->with('error','Email does not send.');
        }
}


//      public function store(ResetPasswordEmailRequest $request)
//     { 


//     $mailtemplate = Mailtemplate::where('name','reset_passsword')->first();
//    if($mailtemplate->status=='active')
//    {

//        $user = User::where('email', $request->email)->where('usergroup_id',1)->first();
        
//         if($user==null)
//         {
//           return  redirect()->back()->with('error','Email does not exist.');
//         }
//         $token = str_random(64);

//         $user->password=Hash::make($token);       

//         if($user->save()) 
//         {
//             Mail::to($user->email)->send(new ResetPassword($user, $token));
            
//              \Session::put('successmessage',__('admin_user.user_password_reset')); 
//         } 
//         else 
//         {
//                         \Session::put('successmessage',__('admin_user.user_password_plsreset')); 
//         }  
//        try{
//                 $ip = $this->getRequestIP();
//                     $this->doActivityLog(                                    
//                       $user,
//                       Auth::user(),
//                       ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']], 
//                       'LOGNAME_RESET_PASSWORD',
//                       'Reset Password'
//                     );

//          }
//         catch(Exception $e)
//           {
             
//             //dd($e->getMessage());
//           }      
 
//          return  redirect()->back()->with('success','Email send successfully.Please check your email.');

//          }  
//         else
//         {
//           return  redirect()->back()->with('error','Email does not send.');
//         }
// }


public function verify($token)
{
   $user = User::where('token', $token)->first();
      if(isset($user))
      {

         $mailtemplate = Mailtemplate::where('name','reset_passsword')->first();
             if($mailtemplate->status=='active')
             {
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
           
                   return  redirect()->back()->with('success','Email send successfully.Please check your email.');

                   }  
                  else
                  {
                    return  redirect()->back()->with('error','Email does not send.');
                  }

      }
}

   
}
