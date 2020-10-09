<?php

namespace App\Events\Order;

use App\Models\Order;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderPaid
{
    use Dispatchable, SerializesModels;

    /**
     * [$order description]
     * @var [type]
     */
    public $order;
    public $data,$product;
   
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Order $order,$data,$product)
    { 
        $this->order = $order;
        $this->data = $data;
        $this->product = $product;
               
    }
}
