<?php

namespace App\Http\Controllers\QuestionAnswer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductQuestion;
use App\Models\ProductAnswer;
use App\Http\Resources\QuestionResource;
use App\Models\Product;
use App\Models\User;
use App\Mail\QuestionMail;
use Exception;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input; 
use App\Traits\Common;
use App\Traits\LogActivity;
use Auth;
use App\Http\Requests\Buyer\QuestionAnswerRequest;
use App\Models\Mailtemplate;     
class QuestionAnswerController extends Controller

{
    use Common,LogActivity;


     public function index($slug)
    {
       // dd($slug);
       $show=(int)$request->show;
      // dd($show);
       $productid=Product::where('slug',$slug)->pluck('id')->toarray();

       $questionid=ProductAnswer::where('product_id',$productid)->pluck('question_id')->toarray();
      if($show!=0){
         $questions=ProductQuestion::with('products')->whereIn('id',$questionid)->where('product_id',$productid)->paginate($show);
      }
      else{
        $questions=ProductQuestion::with('products')->whereIn('id',$questionid)->where('product_id',$productid)->paginate(10);
      }
     
      return $questions;


    }
     public function question($slug)

{ 
   
        //dd($slug);
 $question=ProductQuestion::where('id',$id)->first();
    return QuestionResource(
               $question
            );
      }
        
    public function store(QuestionAnswerRequest $request)
    {
   $res=[];
        try{
             //dd($request);
             $product=Product::with('stores')->where('id',$request->entityid)->first();
             $question= new ProductQuestion;
             $question->buyer_id=$request->user_id;
             $question->question=$request->question;
             $question->seller_id=$product->user_id;
             $question->product_id=$request->entityid;
             $question->save();
             $user=User::where('id',$product->user_id)->first();
            // dd('y');
              
            $mail = Mailtemplate::where('name','question_mail')->first();

             if($mail->status=='active')
             {
               Mail::to($user->email)->queue(new QuestionMail($user->name,$request->question,$product->name)); 
             }
        $ip = $this->getRequestIP();
        $this->doActivityLog(                                    
          $question,
          Auth::user(),
          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
          'LOGNAME_QUESTION_STORED',
          'Question Stored'
        );

   
 return response()->json(['success'=>true,'message'=>'Question Saved Successfully']);
           }
         catch(Exception $e)
         {
             $res['message']=$e->getMessage();
             return $res;
         }

    }

   


}


