<?php

namespace App\Http\Controllers\Admin\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RatingReview;
use App\Http\Resources\RatingReviewResource;
use App\Models\User;
use Auth;

class ReviewController extends Controller
{
    public function reviews(Request $request)
    {
            $paginate=$request->paginate == null ? '10' : $request->paginate;
            $orderby=$request->sort_by == null ? 'asc' : $request->sort_by;

     
            $ratingReviews=RatingReview::with('product');
             
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
          

       
        return view('admin.review.list',[
            'ratingReviews'=>$ratingReviews,
           
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
