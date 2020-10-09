<?php

namespace App\Mail;
use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Mailtemplate;
use App\Models\User;

class NewMessage extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The contact instance.
     *
     * @var Contact
     */
    protected $content,$sub,$user;

    /**
     * Create a new content instance.
     *
     * @return void
     */
    public function __construct($subject,$content,$user)
    {
        $this->content = $content;
        $this->sub = $subject;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {     
        $email=$this->user->email;
        $mailtemplate = Mailtemplate::where([['name','new_message'],['status','active']])->first();  
                  $message= $mailtemplate->mail_content;
                  
                   $message= str_replace(':username',$this->user->name,$message);
                   $message= str_replace(':message',$this->content,$message);
        
        return $this->markdown('emails.mailcontent')
                    ->subject($this->sub)
                    ->with([
                        'content' => $message,
                        ])
                   ->withSwiftMessage(function ($message) use($email) {
                              $message->getHeaders()
                   ->addTextHeader('user_email', $email);
    });;
      

    }
}
