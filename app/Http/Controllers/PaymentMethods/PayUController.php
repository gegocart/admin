<?php

namespace App\Http\Controllers\PaymentMethods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;

class PayUController extends Controller
{
    public function store(Request $request)
    {
    	$res=array();
    	//if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0){
			//Request hash
			// $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';	
			// dump($contentType);
			// if(strcasecmp($contentType, 'application/json') == 0){
				//$data = json_decode(file_get_contents('php://input'));
				$hash=hash('sha512', $request->key.'|'.$request->txnid.'|'.$request->amount.
					'|'.$request->pinfo.'|'.$request->fname.'|'.$request->email.'|||||'
					.$request->udf5.'||||||'.$request->salt);
				//dump($hash);
				//$json=array();
				$res['message'] = $hash;
		    	return $res;
			
			// }
			// exit(0);
		}
		   // }
}
