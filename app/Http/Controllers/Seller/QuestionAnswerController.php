<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductQuestion;
use App\Models\ProductAnswer;
use App\Models\User;
use App\Mail\AnswerMail;
use Illuminate\Support\Facades\Mail;
use Segment;
use Exception;
use App\Http\Resources\QuestionAnswerResource;
use App\Http\Resources\QuestionAndAnswerResource;
use App\Http\Requests\Seller\AnswerRequest;
use App\Http\Resources\QuestionsearchResource;
use Auth;
use App\Models\Mailtemplate;
 
class QuestionAnswerController extends Controller
{
  public function searchquestion(Request $request)
  {
   
    $search=$request->name;
      
   $productQuestion=ProductQuestion::with('products')->where('seller_id',Auth::id());
 
    if($search!="")
    {

      $productQuestion=ProductQuestion::with('products')->where('seller_id',Auth::id())->where(function($query)use ($search){
        $query->orWhere('question','LIKE',$search.'%')->orwhereHas('products',function($q) use ($search){
          $q->Where('name','LIKE','%'.$search.'%');
            });
         });
  
    }

    $productQuestion=$productQuestion->get();
   // dd($productQuestion);
    return QuestionsearchResource::collection($productQuestion);


  }
    
    public function getqusandans($param,$userid,$paginate)
    {
      // dd($paginate);
       $questionanswer;
     if($userid==0){
       $product=Product::where('slug',$param)->first();
       $questionid=ProductQuestion::where('product_id',$product->id)->pluck('id')->toArray();
       $questionanswer=ProductAnswer::with('question')->whereIn('question_id',$questionid)
       ->where('status','approve')->where('visibility','public')->paginate($paginate);
      }
     else{
      
       // $product=Product::where('slug',$param)->first();
       // $questionanswer=ProductAnswer::with('question')->where('product_id',$product->id)->where('status','approve')->get();

       //     $questionanswer=$questionanswer->reject(function($q) use ($userid){
       //       return $q->visibility=='private' && $q->buyer_id!=$userid;
       //     });
     $product=Product::where('slug',$param)->first();
       $questionanswer=ProductAnswer::with('question')->where('product_id',$product->id)->where('status','approve')->where(function($q) use($userid){
            $q->where('visibility','=','public')->orWhere([['visibility','=','private'],['buyer_id','=',$userid]]);

       })->paginate($paginate);

    }
    
    return QuestionAndAnswerResource::collection($questionanswer);
    // return $questionanswer;

    }

    public function index(Request $request)
    {
       $show=(int)$request->show;
       
      if($show!=0){
         $questions=ProductQuestion::with(['products','answer'])
                  ->where('seller_id',Auth::id())->paginate($show);
      }
      else{
        $questions=ProductQuestion::with(['products','answer'])
                   ->where('seller_id',Auth::id())->paginate(10);
      }
       
   
      return QuestionAnswerResource::collection($questions);


    }
     public function storeanswer(AnswerRequest $request)
    {
     
     // dd('hi');
     
       $res=[];

        try{
            $productquestion=ProductQuestion::where('id',$request->question_id)->first();
             
             $productanswer=ProductAnswer::where('question_id',$request->question_id)->first();
             
               if(count($productanswer)>0)
               {
                  return response()->json(['success'=>false,'message'=>'Only one answer allowed.'],200);
                 
               }
             $answer= new ProductAnswer;
             $answer->question_id=$request->question_id;
             $answer->product_id=$productquestion->product_id;
             $answer->seller_id=Auth::id();
             $answer->buyer_id=$productquestion->buyer_id;
             $answer->answer=$request->answer;

               if(($request->visible)=='true')
               {
               $answer->visibility='public';
             }
             else
             {
                $answer->visibility='private';
             }
             $answer->status='approve';
            // $answer->likes='0';
            // $answer->dislikes='0';
             $answer->save();
             $user=User::where('id',$productquestion->buyer_id)->first();
               $mail = Mailtemplate::where('name','answer_mail')->first();
             if($mail->status=='active')
             {
              Mail::to($user->email)->queue(new AnswerMail($user->name,$request->answer,
                $productquestion)); 
              }
             return response()->json(['success'=>true,'message'=>'Saved Successfully'],200);
           }
         catch(Exception $e)
         {
              return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
         }
     }

    public function edit($id)
    {
       $productanswer=ProductAnswer::where('id',$id)->first();

       if(is_null($productanswer))
       {
          return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
         
       }
      elseif(auth()->user()->id!=$productanswer->seller_id){
          return response()->json(['success'=>false,'message'=>'Forbidden'],403);
            }
       
     
       return $productanswer;

    }

     public function updateanswer(AnswerRequest $request, $id)
    {
    
       $res=[];

        try{
              $productquestion=ProductQuestion::where('id',$request->question_id)->first();
             $productanswer=ProductAnswer::find($id);
             $productanswer->answer=$request->answer;
             
              if(($request->visibility)=='true')
               {
               $productanswer->visibility='public'; 
             }
             else
             {
                $productanswer->visibility='private';
             }
             $productanswer->status='approve';
            // $answer->likes='0';
            // $answer->dislikes='0';
             $productanswer->save();
             $user=User::where('id',$productquestion->buyer_id)->first();
              Mail::to($user->email)->queue(new AnswerMail($user->name,$request->answer,
                $productquestion)); 

            return response()->json(['success'=>true,'message'=>'Updated Successfully'],200);
           }
         catch(Exception $e)
         {
              return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
         }
     }

      public function destroy($id)
      {
     
        try {
           $productanswer=ProductAnswer::where('id',$id)->first();
           if(is_null($productanswer))
           {
              return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
            }
           elseif(auth()->user()->id!=$productanswer->seller_id){
                return response()->json(['success'=>false,'message'=>'Forbidden'],403);
                  }
           else
           {
               $productanswer=$productanswer->delete();
               return response()->json(['success'=>true,'message'=>'Deleted Successfully'],200);

             }
           }
           catch(Exception $e)
           {
              return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
           }
      }
}
