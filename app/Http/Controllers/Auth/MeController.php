<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\PrivateUserResource;
use Illuminate\Http\Request;

class MeController extends Controller
{
    public function __construct()
    {
      $this->middleware(['auth:api']);
     // $this->middleware(['auth:api','verified']);
   
    }

    public function action(Request $request)
    {
       return new PrivateUserResource($request->user());
    }
}
