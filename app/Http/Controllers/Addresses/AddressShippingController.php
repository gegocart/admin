<?php

namespace App\Http\Controllers\Addresses;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShippingMethodResource;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressShippingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function action(Address $address)
    {
        $this->authorize('show', $address);
        
        return ShippingMethodResource::collection(
            $address->country->shippingMethods
        );
    }
}
