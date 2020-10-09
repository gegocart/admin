<?php
namespace App\Http\Controllers\Admin\Buyer;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\RatingReview;
use App\Http\Resources\RatingReviewResource;
use App\Models\User;
use Auth;

class ReviewController extends Controller
{
     public function getreview($id)
    {
        $ratingReviews=RatingReview::with('product')->where('id',$id)->get();
        $ratingReviews=RatingReviewResource::collection($ratingReviews);
          return $ratingReviews;
    }

    public function reviews(Request $request,$userid)
    {
            $paginate=$request->paginate == null ? '10' : $request->paginate;
            $orderby=$request->sort_by == null ? 'asc' : $request->sort_by;
            $preuser=User::PreUser($userid,4)->first();
            $nextuser=User::NextUser($userid,4)->first();
    

          
        $user=User::with('defaultAddress')->where('id',$userid)->first();  

             $ratingReviews=RatingReview::with('product')->where('user_id',$userid);
             
             $search=$request->search;

             if($search!="")
             {

                $ratingReviews=$ratingReviews->where(function($query) use ($search){

                    $query->orWhere('id',$search)
                    ->orwhere('created_at', 'LIKE',$search.'%')->orWhere('rating',$search)
                    ->orwhereHas('product',function($q) use ($search){
                        $q->Where('name','LIKE',$search.'%');
                    });
                });   

                  
             }
       
      $ratingReviews=$ratingReviews->orderby('id',$orderby)->paginate($paginate);

       $ratingReviews=$ratingReviews->appends(array('sort_by' =>request('sort_by'),
                                 'paginate'=>request('paginate'),
                                 'search'=>request('search'),
                               ));
          

       
        return view('admin.buyer.reviews',[
            'ratingReviews'=>$ratingReviews,
            'user'=>$user,

             'preuser'=>$preuser,
             'nextuser'=>$nextuser,
        ]); 
    }
    public function delReview($id)
    {
       RatingReview::where('id',$id)->delete();
       return redirect()->back()->with(['success'=>'Successfully deleted']);
    }
    public function reviewUpdate(Request $request)
  {
    
       $ratingReviews =RatingReview::where('id',$request->id)->first();
       $ratingReviews->status=$request->status=="Approved"?'approved':'not_approved';
        
       $ratingReviews->approved_by=Auth::id();
      $ratingReviews->save();
     return redirect()->back()->with(['success'=>'Review status updated successfully']);
       
   
       
  }
}
