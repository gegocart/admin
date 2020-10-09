<?php

namespace App\Events\Order;

use App\Models\Order;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderCreated
{
    use Dispatchable, SerializesModels;

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
