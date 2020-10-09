<?php

namespace App\Http\Controllers\Admin\Buyer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Models\User;
use App\Models\Mailtemplate;
use App\Mail\AdminMailMessage;
use App\Http\Requests\Admin\Buyer\SendMailRequset;

class MailMessageController extends Controller
{
   
    public function create()
    {
         return view('admin.buyer.sendmail');
    }

   
    public function sendMail(SendMailRequset $request,$id)
    {

        $user =User::where('id',$id)->first();
      
      $mailtemplate = Mailtemplate::where('name','send_message')->first(); 
      
      if($mailtemplate->status=='active')
      {
        Mail::to($user->email)->queue(new AdminMailMessage($user,$request->subject,$request->message)); 
        return redirect('/admin/buyer/'.$user->id.'/details')->with('success','Sent mail successfully');
      } 
      else
      {
        return redirect('/admin/buyer/'.$user->id.'/details')->with('success','The mail was not send, status is inactive');
      }
        

    }

    
}
