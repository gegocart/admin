<?php

namespace App\Http\Controllers\Rating;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RatingReview;
use App\Models\ReviewGallery;
use App\Models\Product;
use App\Http\Requests\RatingReviewRequest;
use App\Http\Resources\RatingReviewResource;
use Illuminate\Http\File;
use Exception;
use Intervention\Image\Facades\Image;
use App\Traits\Common;
use App\Traits\LogActivity;
use Auth;
 use App\Models\OrderItem;
      
class RatingReviewController extends Controller
{
     use Common,LogActivity;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($productid)
    {

        $rating=RatingReview::with('user')->where('status','approved')
                                  ->where('entity_id',$productid)->get();

        return RatingReviewResource::collection(
            $rating
        );
        //return $rating;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RatingReviewRequest $request) 
    {
        $res=[];

        try
        {


            $ratingreview=RatingReview::where('entity_id',$request->entity_id)
               ->where('user_id',Auth::id())->first();
                    //->where('entity_id',$request->entity_id)->first();
             $classname='';
            if(count($ratingreview)>0)
            {
                $res['message']="Rating already done.";
            }
            
            else
            {
                $orderitem=OrderItem::where([['product_id','=',$request->entity_id],['buyer_id','=',Auth::id()]])->get();
                
                 
                 
                 if(count($orderitem)>0)
                 {
                       
                 

                if($request->entity_name=='product')
                 {
                    $product=Product::where('id',$request->entity_id)->first();
                    $classname=get_class($product);
                 }

                $rating=new RatingReview();
                $rating->entity_id=$request->entity_id;
                $rating->entity_name=$classname;
                $rating->user_id=Auth::id();
                $rating->title=$request->title;
                $rating->description=$request->description;
                $rating->customer_name=$request->customer_name;
                $rating->rating=$request->rating;
                $rating->save();

                   // dd($request->file(['review_image1']));
             
                for($i=0;$i<$request->imagecount;$i++)
                {
                 
                        
                 $imagepath = $this->uploadFile('uploads/review'
                  ,$request->file(['review_image'.$i]));
              
               $name = $request->file(['review_image'.$i])->getClientOriginalName();
              
           
                 
                  $resizeimage_path=$this->getFilePath($imagepath);

                  $img = Image::make($resizeimage_path);
                  $img->resize(40,40);
                
                  $img->save('uploads/review/thumbnail/'.$name);
                
                  $thumbnailimage='uploads/review/thumbnail/'.$name;

                 $reviewgallery=new ReviewGallery();
                 $reviewgallery->rating_id=$rating->id;
                 $reviewgallery->imagepath=$imagepath;
                 $reviewgallery->thumbnailimage=$thumbnailimage;
                 $reviewgallery->save();
               }

                $res['message']="Saved Successfully";

               }
             else
             {
                  $res['message']="You are not buy this product";
                       return $res;
             } 
          }

   // try{
   //      $ip = $this->getRequestIP();
   //      $this->doActivityLog(                                    
   //        $rating,
   //        Auth::user(),
   //        ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
   //        LOGNAME_REVIEW_STORED,
   //        'Question Stored'
   //      );

   //   }
   //  catch(Exception $e)
   //        {
             
            //dd($e->getMessage());
          // }
            return $res;
        }
         catch(Exception $e)
         {
             $res['message']=$e->getMessage();
             return $res;
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
