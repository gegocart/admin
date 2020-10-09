<?php

namespace App\Http\Controllers\Admin\Seller;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Mail;
use App\Traits\Common;
use App\Traits\LogActivity;
use Auth;
use Exception;
 
use App\Mail\ResetPassword;

use App\Models\Mailtemplate;


class ResetPasswordController extends Controller
{use Common,LogActivity;
   
    public function create($id)
    {
        $user=User::where('id',$id)->first();
        return view('admin.buyer.resetpassword',[
            'user'=>$user,
        ]);
    }

    public function resetpassword(Request $request)
    {

   $mailtemplate = Mailtemplate::where('name','reset_passsword')->first();

   if($mailtemplate->status=='active')
   {
        $user = User::where('name', $request->name)->first();
        //dd($user->email);
        $token = str_random(64);
   //dd($user);
  
        // $password = \DB::table(config('auth.passwords.users.table'))->insert([
        //         'email' => $user->email, 
        //         'token' => Hash::make($token),
        //         'created_at' =>Carbon::now()
        //     ]);

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
        return response()->json(['success'=>'Successfully']);

    }

  
  else
  {
    return response()->json(['success'=>'not Successfully']);
  }
 }

    
}
