<?php

namespace App\Http\Controllers\Admin\Buyer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Buyer\SendMailRequset;
use Illuminate\Http\Request;
use App\Mail\AddBuyerMail;
use Mail;
use App\Mail\VerifyMail;
use App\Traits\RegisterUserTrait;
use App\Http\Requests\Admin\Buyer\AddBuyerRequest;
use App\Models\Address;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ActivityLog;
use App\Models\Transaction;
use App\Models\OrderStatus;
use App\Models\Invoice;
use App\Models\RatingReview;
use App\Models\SellerProfile;
use App\Models\GiftcardOrder;
use App\Http\Resources\RatingReviewResource;
use App\Traits\Common;
use App\Traits\LogActivity;
use Exception;
use Auth;
use App\Models\Usergroup;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Http\Requests\Admin\Buyer\EditRequest;
use File;
use App\Models\User;
use App\Models\ProductQuestion;
use App\Models\CartUser;

use App\Models\Mailtemplate;


class BuyerController extends Controller
{
    use RegisterUserTrait,Common,LogActivity;
    
    public function index(Request $request)
    {
     
        $paginate=$request->paginate == null ?'10':$request->paginate;
        $orderby=$request->sort_by==null?'asc':$request->sort_by;

        $search=$request->search;


          $buyers=User::with('addresses','orders','ratingReview')->ByUserType('4');

              if($search!="")
            {

                $buyers=$buyers->where(function($query) use($search){
                    $query->orWhere('name','LIKE',$search.'%')
                    ->orWhere('email','LIKE',$search.'%')
                    ->orwhereHas('addresses',function($q) use($search){
                         $q->Where('address_1','LIKE','%'.$search.'%');
                 });
                });
            } 
    
          $buyers=$buyers->orderby('id',$orderby)->paginate($paginate);

           $buyers=$buyers->appends(array('sort_by' =>request('sort_by'),
                                 'paginate'=>request('paginate'),
                                 'search'=>request('search'),
                               ));
          return view('admin.buyer.list',[
            'buyers'=>$buyers,
            'paginate_old'=>$paginate,
            'orderby'=>$orderby,
            'search'=>$request->search,
          ]);
    }


     public function getuser($id)
    {
        $user=User::where('id',$id)->first()->toArray();
        return $user;
    }
    
   
     public function check()
    {
       return view('admin.buyer.confirm');
    }

   
    public function show($id)
    {
        $user=User::with('defaultAddress','usergroup')->where('id',$id)->first();      
        
         $preuser=User::PreUser($id,4)->first();
         $nextuser=User::NextUser($id,4)->first();
             
        return view('admin.buyer.profile',[
            'user'=>$user,
            'preuser'=>$preuser,
            'nextuser'=>$nextuser,
            
        ]);
    }


   
    
    public function activities($id)
    {
         $preuser=User::PreUser($id,4)->first();
         $nextuser=User::NextUser($id,4)->first();
       $activitylogs = ActivityLog::with('user')->where('causer_id',$id)->orderby('id','desc')->paginate(10);
         $user=User::with('defaultAddress')->where('id',$id)->first();  
         $activitylogs=$activitylogs->appends(array('sort_by' =>request('sort_by'),
                                 'paginate'=>request('paginate'),
                                 'search'=>request('search'),
                               ));

        return view('admin.buyer.activity',[
            'user'=>$user,
            'preuser'=>$preuser,
            'nextuser'=>$nextuser,
            'activitylogs'=>$activitylogs,
        ]);
    }
    public function loginhistory($id)
    {
        $preuser=User::PreUser($id,4)->first();
         $nextuser=User::NextUser($id,4)->first();
         $user=User::with('defaultAddress')->where('id',$id)->first();  
         $activitylogs = ActivityLog::with('user')->where('log_name','LOGNAME_LOGIN')->where('causer_id',$id)->orderby('id','desc')->paginate(10);

           $activitylogs=$activitylogs->appends(array('sort_by' =>request('sort_by'),
                                 'paginate'=>request('paginate'),
                                 'search'=>request('search'),
                               ));

        return view('admin.buyer.loginhistory',[
            'user'=>$user,
            'preuser'=>$preuser,
            'nextuser'=>$nextuser,
            'activitylogs'=>$activitylogs,
        ]);
    }

    
    public function create()
    {
         return view('admin.buyer.addbuyer');
    }

   
    public function store(AddBuyerRequest $request)
    {

       $user=$this->createUser([

            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'usergroup_id'=>4,

        ]);

    
             try{
                        $ip = $this->getRequestIP();
                        $this->doActivityLog(                                    
                          $user,
                          Auth::user(),
                          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
                          'LOGNAME_BUYER_CREATED',
                          'Buyer Created'
                        );

              }
              catch(Exception $e)
              {
                 
                //dd($e->getMessage());
              }            

        ;
         
      $mailtemplate = Mailtemplate::where('name','admin_register_new_user')->first(); 
    
    if($mailtemplate->status=='active')    
     {
        Mail::to($request->email)->queue(new AddBuyerMail($request->name,$request->email,$request->password));
    }
     Mail::to($user->email)->queue(new VerifyMail($user));
        return redirect('/admin/buyer')->with(['success'=>trans('success.useradd')]);

    }  
  
    public function statusUpdate(Request $request,$id)
    {

         $user=User::where('id',$id)->first();
         $user->status=$request->status;
         $user->save();
       
    }
    public function edit($id)
    {
      $user=User::with('defaultAddress')->where('id',$id)->first();
      
      $usergroups=Usergroup::get();
      return view('admin.buyer.edit',[
        'user'=>$user,
        'usergroups'=>$usergroups,
      ]);
    }

    public function update(EditRequest $request,$id)
    {  

      $user=User::with('defaultAddress')->where('id',$id)->first();
  
        \DB::beginTransaction();
     try{
 
                if($user->name!=$request->name)
                {
                  $user->name=$request->name;
                }
                
               if($user->email!=$request->email)
               {
                   $user->email=$request->email;
                  $user->email_verified_at=null;
                  $user->token=sha1(time());
               }

 
               // $user->usergroup_id=$request->usergroup_id;

            if($request->image!=null)
            {
                if($user->image!="")
                {
                    $oldimage=$user->image;
                    File::delete($user->image);
                }

                $imageName = $user->name.time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('profile'), $imageName);
                $user->image = 'profile/'.$imageName;
                 
            }

          $user->update();
         
          \DB::commit();

          if($user->email_verified_at==null)
            {
                Mail::to($user->email)->queue(new VerifyMail($user));
            }
          
            return redirect()->back()->with(['success'=>'Successfully updated']);
             
        }
    catch(Exception $e)
          {
           \DB::rollBack();
            // dd($e->getMessage());
          }
    }
    
    public function verifyCode(Request $request)
    {
        $user=User::find($request->id);
        $user->token=sha1(time());
        $user->save();
         Mail::to($user->email)->queue(new VerifyMail($user));      
         $response['messages']="Verify mail sent successfully";
         return $response;
    }
    public function destroy(Request $request)
    {

         \DB::beginTransaction();
     try{
           Address::where('user_id',$request->id)->delete();

           User::find($request->id)->delete();

           // CartUser::where('user_id',$request->id)->delete();

           Order::where('user_id',$request->id)->delete();

           OrderItem::where('buyer_id',$request->id)->delete();
           
           ProductQuestion::where('buyer_id',$request->id)->delete();

           RatingReview::where('user_id',$request->id)->delete();


           \DB::commit();    
            return redirect()->back()->with(['success'=>'Successfully updated']);
             
        }
    catch(Exception $e)
          {
            \DB::rollBack();
            // dd($e->getMessage());
          }
    }

}
