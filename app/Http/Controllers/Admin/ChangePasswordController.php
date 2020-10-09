<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\AdminChangePasswordRequest;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\ChangePasswordMail;
use App\Traits\Common;
use App\Traits\LogActivity;
use Auth;
use Exception;
use App\Models\Mailtemplate;
    
class ChangePasswordController extends Controller
{ use Common,LogActivity;
    
    
    public function create()
    {
        return view('admin.changepassword');
    }

    
    public function store(AdminChangePasswordRequest $request)
    {
      //dd($request->file);
/*$imagepath = $this->uploadFile('uploads/images'
                  ,$request->file);*/

        $user=User::where('id',Auth::id())->first();
        $user->password=Hash::make($request->password);
        //$user->image=$imagepath;
        $user->save();

        $mailtemplate=Mailtemplate::where('name','change_password')->first();
      
       if($mailtemplate->status=='active')
       {
        Mail::to($user->email)->queue(new ChangePasswordMail($user->name));
       }  
           try{
                $ip = $this->getRequestIP();
                    $this->doActivityLog(                                    
                      $user,
                      Auth::user(),
                      ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
                      'LOGNAME_CHANGE_PASSWORD',
                      'Change Password'
                    );

         }
        catch(Exception $e)
          {
             
            //dd($e->getMessage());
          }      
        return back()->with(['success'=>'Password change successfully']);
    }

    
    
}
