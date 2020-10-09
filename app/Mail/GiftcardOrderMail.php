<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Mailtemplate;
use App\Models\GiftcardOrder;
use App\Models\Product;


class GiftcardOrderMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $orderproduct;
    public $item_id;
   
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderproduct,$item_id)
    {
        //

        $this->orderproduct=$orderproduct;
        $this->item_id=$item_id;
        

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        $giftcard_detail=GiftcardOrder::where([['order_id',$this->orderproduct->order_id],
            ['amount',$this->orderproduct->price],['item_id',$this->item_id]])->get();
        if($this->orderproduct->card_image!=null){
            
           $card_designs=Product::where([['id',$this->orderproduct->card_image]])->first(); 
         
          // $card_design='uploads/' . $card_designs->imagepath;

           $card_design=$card_designs->productgallery[0]->imagepath;
           $card_name=$card_designs->name;
        }
        else{
            $card_design=$this->orderproduct->productdetail['productimage'][0]['imagepath'];
            $card_name=$this->orderproduct->productdetail['product']['name'];
        }
        
        return $this->markdown('emails.giftcardmail')
                    ->subject($card_name)
                    ->with([
                        'giftcard'=> $giftcard_detail,
                        'from'=>$this->orderproduct->from,
                        'message'=>$this->orderproduct->message,
                        'design'=>$card_design,
                        'cardname'=>$card_name
                        ]);
    }
}
