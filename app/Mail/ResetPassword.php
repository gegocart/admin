<?php

namespace App\Mail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Mailtemplate;

class ResetPassword extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The token instance.
     *
     * @var Token
     */
    protected $token;

    /**
     * The userdetails instance.
     *
     * @var userdetails
     */
    protected $userdetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $userdetails, $token)
    {
        $this->userdetails = $userdetails; 
        $this->token = $token; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = User::where('id', Auth::id())->first();
        
        // return $this->markdown('emails.admin.resetpassword')
        //             ->with([
        //                 'resetlink' => url('/password/reset/'.$this->token),
        //                 'resetlinktext' => trans('mail.resetlinktext'),
        //                 'message' => trans('mail.reset_password_message'),
        //                 'username' => $this->userdetails->userprofile->firstname.' '. $this->userdetails->userprofile->lastname,                        
        //                 'signature' => trans('mail.signature'),
        //             ]);

        $mailtemplate = Mailtemplate::where([['name','reset_passsword'],['status','active']])->first();

        // $url = url('/password/reset/'.$this->token);

        $subject =  $mailtemplate->subject;
        $mail_content = $mailtemplate->mail_content;
 
        $mail_content = str_replace(":username",$this->userdetails->name,$mail_content);
        $mail_content = str_replace(":newpassword",$this->token,$mail_content);
        //dd($mail_content);

        return $this->markdown('emails.mailcontent')
                    ->subject($subject)
                    ->with([
                        'content' => $mail_content,
                        ]);
    }
}
