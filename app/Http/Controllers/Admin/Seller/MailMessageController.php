<?php

namespace App\Http\Controllers\Admin\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Models\User;
use App\Mail\Admin\Seller\SendMail;
use App\Http\Requests\Admin\Seller\SendMailRequset;
use App\Mail\AdminSellerSendMail;
use App\Models\Mailtemplate;
class MailMessageController extends Controller
{
   
    public function sendMail(SendMailRequset $request,$id)
    {
        $user =User::where('id',$id)->first();
         $mailtemplate = Mailtemplate::where([['name','send_message'],['status','active']])->first(); 
            if($mailtemplate->status=='active')
            {
                Mail::to($user->email)-> queue(new AdminSellerSendMail($user,$request->subject,$request->message));
                return redirect('/admin/seller/'.$user->id.'/details')->with('success','Sent mail successfully');
            }
            else
            {
                return redirect('/admin/seller/'.$user->id.'/details')->with('success','The mail was not send, status is inactive');
             }

      }

    public function create()
    {
         return view('admin.seller.sendmail');
    }
    

    
}
