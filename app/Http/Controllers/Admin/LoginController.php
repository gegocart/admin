<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\AuthenticatesUsers;
use App\Models\User;

class LoginController extends Controller
{
    //
    use AuthenticatesUsers;
    protected $redirectTo = '/admin/dashboard';

    public function create()
    {
        return view('admin/login');
    }


  
  
 /* public function login(Request $request)
    {
     // dd('1');
     
       $user=User::where('email',$request->email)->first();
    
       if($user->usergroup_id==1)
       {
       
        return redirect('admin/dashboard');
       }

       }*/

}
