<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Resources\SellerResource;
use App\Http\Resources\SellerProfileResource;

use Hash;
use \Crypt;

class SellerController extends Controller
{
    public function index() {
       
    	$sellers = User::with('sellerprofile')->where('status', 1)->where('usergroup_id', 3)->paginate(20);
    	
      // $sellers = User::with(['sellerprofile','products'=>function($q){$q->where('status',1);}])->where('status', 1)->where('usergroup_id', 3)->paginate(20);

      return SellerResource::collection($sellers);
    }

    public function show($name) 
    {
    	$sellers = User::with(['sellerprofile','defaultAddress','mystores'=>function($q){
        $q->where('status',1);
      }
    	,'myproducts'=>function($query){
          $query->where('status',1);
      },'ratingReview'])->where('status', 1)->where('name', $name)->first();
     
      // $sellers=$sellers->setRelation('myproducts', $sellers->myproducts()->paginate(10));
        
      return new SellerResource($sellers);
      // return $sellers;
    }

   
}
