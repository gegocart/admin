<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\OrderDetail;
use App\Models\Mailtemplate;

class OrderCancelBuyerMail extends Mailable
{
    use Queueable, SerializesModels;
       public $orderItemId,$username;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderItemId,$username)
    {
        $this->orderItemId=$orderItemId;
        $this->username=$username;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $orderDetail=OrderDetail::where('order_item_id',$this->orderItemId)->first();
          

          
           $mailtemplate = Mailtemplate::where([['name','cancel_item_buyer'],['status','active']])->first(); 
                  $subject =  $mailtemplate->subject;
          $mail_content = $mailtemplate->mail_content;
             $mail_content= str_replace(':productname',$orderDetail->productname,$mail_content);
               // dd($mail_content);
                 $mail_content= str_replace(':name',$this->username,$mail_content);

                  

          return $this->markdown('emails.mailcontent')
                    ->subject($subject)
                    ->with([
                        'content' => $mail_content,
                        ]); 
    }
}
