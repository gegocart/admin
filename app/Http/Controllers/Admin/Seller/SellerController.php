<?php

namespace App\Http\Controllers\Admin\Seller;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\AddSellerMail;
use Mail;
use App\Mail\VerifyMail;
use App\Traits\RegisterUserTrait;
use App\Http\Requests\Admin\Seller\AddSellerRequest;
use App\Models\Address;
use App\Models\RatingReview;
use App\Models\ProductGallery;
use App\Models\Store;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Models\OrderStatus;
use App\Models\ActivityLog; 
use App\Models\SellerProfile;

use App\Http\Resources\RatingReviewResource;
use App\Traits\Common;
use App\Traits\LogActivity;
use Exception;
use Auth;
use App\Models\Usergroup;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Http\Requests\Admin\Seller\EditRequest;
use File;
use App\Models\CartUser;
use App\Models\Invoice;
use App\Models\Pincode;
use App\Models\Fee;
use App\Models\PaymentMethod;
// use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Response;
// use App\Mail\VerifyMail;
use App\Models\Mailtemplate;
use App\Models\WishListItem;
use App\Models\WishList;
class SellerController extends Controller
{
   use RegisterUserTrait,Common,LogActivity;


 public function pdfDownload($id)
 { 

  $invoice=Invoice::where('user_id',$id)->first();


    if($invoice->filepath!="")
    {
     

    
   // $file= public_path(). "/uploads/invoice/".$invoice->filepath;
   $file= public_path().'/'.$invoice->filepath;
  // dd('dd');

 // $file="E:\laragon\www\admin-app\public/uploads/uploads/source/uHfsSGcD6iWxvY8joe6hvDpdWM5Q9sDde3Mqq0Qp.pdf";

    $headers = array(

              'Content-Type: application/pdf',

            );
    return Response::download($file, str_random(32).'.pdf', $headers); 
  }
  return redirect()->back();
 }
  
 public function index(Request $request)
{       
        $paginate=$request->paginate==null?'10':$request->paginate;
        $orderby=$request->sort_by==null?'asc':$request->sort_by;

         $search=$request->search;
       
     $sellers=User::with('sellerprofile','addresses','mystores','orderItem','invoice')->ByUserType('3');
           if($search!="")
            {

                $sellers=$sellers->where(function($query) use($search){
                    $query->orWhere('name','LIKE',$search.'%')
                    ->orWhere('email','LIKE',$search.'%')
                    ->orwhereHas('addresses',function($q) use($search){
                         $q->Where('address_1','LIKE','%'.$search.'%');
                 });
                });
            } 
        $sellers=$sellers->orderby('id',$orderby)->paginate($paginate);
            // $sellers=$sellers->orderby('id',$orderby)->get();

              $sellers=$sellers->appends(array('sort_by' =>request('sort_by'),
                                 'paginate'=>request('paginate'),
                                 'search'=>request('search'),
                               ));
                  
          return view('admin.seller.list',[
            'sellers'=>$sellers,
            // 'paginate_old'=>$paginate,
            'orderby'=>$orderby,
            'search'=>$request->search,
          ]);
    }


     public function activities($id)
    {
        $preuser=User::PreUser($id,3)->first();
        $nextuser=User::NextUser($id,3)->first();
         $user=User::with('defaultAddress')->where('id',$id)->first();  
        $activitylogs = ActivityLog::with('user')->where('causer_id',$id)->orderby('id','desc')->paginate(10);
       
       $activitylogs=$activitylogs->appends(array('sort_by' =>request('sort_by'),
                                 'paginate'=>request('paginate'),
                                 'search'=>request('search'),
                               ));

        return view('admin.seller.activity',[
            'user'=>$user,
            'preuser'=>$preuser,
            'activitylogs'=>$activitylogs, 
            'nextuser'=>$nextuser,
        ]);
    }
    public function loginhistory($id)
    {
            $preuser=User::PreUser($id,3)->first();
            $nextuser=User::NextUser($id,3)->first();
         $user=User::with('defaultAddress')->where('id',$id)->first();  
        $activitylogs = ActivityLog::with('user')->where('causer_id',$id)->orderby('id','desc')->paginate(10);
        
          $activitylogs=$activitylogs->appends(array('sort_by' =>request('sort_by'),
                                 'paginate'=>request('paginate'),
                                 'search'=>request('search'),
                               ));

        return view('admin.seller.loginhistory',[
            'user'=>$user,
            'preuser'=>$preuser,
            'activitylogs'=>$activitylogs, 
            'nextuser'=>$nextuser,

        ]);
    }
    public function create()
    {
         return view('admin.seller.addseller');
    }

    public function store(AddSellerRequest $request)
    {


         \DB::beginTransaction();
     try{


        $user=$this->createUser([

            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'usergroup_id'=>3,

        ]);

            $sellerprofile=new SellerProfile;
            $sellerprofile->user_id=$user->id;
            $sellerprofile->seller_name=$user->name;
            $sellerprofile->email=$user->email;
            $sellerprofile->status="approved";
            $sellerprofile->save();

         \DB::commit();  
  
     
           try{
                        $ip = $this->getRequestIP();
                        $this->doActivityLog(                                    
                          $user,
                          Auth::user(),
                          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
                          'LOGNAME_SELLER_CREATED',
                          'Seller Created'
                        );

              }

              catch(Exception $e)
              {
                 
                //dd($e->getMessage());
              } 
    
    $mailtemplate = Mailtemplate::where('name','reset_passsword')->first(); 
    
    if($mailtemplate->status=='active')    
     {
      
      Mail::to($request->email)->queue(new AddSellerMail($request->name,$request->email,$request->password));

     }
       Mail::to($user->email)->queue(new VerifyMail($user));    
       return redirect('/admin/seller')->with(['success'=>'User add successfully']);

      }
        catch(Exception $e)
        {
            \DB::rollBack();
          // dd($e->getMessage());
        }
       

    }

  
 public function show($id)
    {
        $user=User::with('defaultAddress','usergroup')->where('id',$id)->first();      
        
          $preuser=User::PreUser($id,3)->first();
          $nextuser=User::NextUser($id,3)->first();
          
        
        return view('admin.seller.profile',[
            'user'=>$user,
            'preuser'=>$preuser,
            'nextuser'=>$nextuser,
        ]);
    }
 public function edit($id)
    {
      $user=User::with('defaultAddress')->where('id',$id)->first();
      
      $usergroups=Usergroup::get();
      return view('admin.seller.edit',[
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

     public function getsellerprofile($id)
    {
        $user=SellerProfile::where('user_id',$id)->first()->toArray();
        return $user;
    }
    


    public function statusUpdate(Request $request,$id)
    {
    
         $user=User::where('id',$id)->first();
         $user->status=$request->status;
         $user->save();

         if($user->usergroup_id==3)
         {
            $sellerprofile=SellerProfile::where('user_id',$user->id)->first();
            if($request->status==1)
            {
                $sellerprofile->status='approved';
            }
            else{
                $sellerprofile->status='not_approved';
            }
            
            $sellerprofile->save();
         }
         
        if($user->status==0)
        {
            $response['message']='Deactive user successfully';
               try{
                        $ip = $this->getRequestIP();
                        $this->doActivityLog(                                    
                          $user,
                          Auth::user(),
                          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
                          'LOGNAME_USER_DEACTIVED',
                          'User Deactived'
                        );

              }
              catch(Exception $e)
              {
                 
                //dd($e->getMessage());
              }
                return $response;
        }
        else
        {
            $response['message']='Active user successfully';
                try{
                        $ip = $this->getRequestIP();
                        $this->doActivityLog(                                    
                          $user,
                          Auth::user(),
                          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
                          'LOGNAME_USER_ACTIVED',
                          'User Actived'
                        );

              }
              catch(Exception $e)
              {
                 
                //dd($e->getMessage());
              }            
            return $response;
        }
      }

    public function destroy(Request $request)
    {

         \DB::beginTransaction();
     try{
           Address::where('user_id',$request->id)->delete();

           User::find($request->id)->delete();
           
          Invoice::where('user_id',$request->id)->delete();

          OrderItem::where('seller_id',$request->id)->delete();
           
          Pincode::where('seller_id',$request->id)->delete();

          SellerProfile::where('user_id',$request->id)->delete();

          Store::where('user_id',$request->id)->delete();

          // CartUser::where('user_id',$request->id)->delete();

           // Fee::where('user_id',$request->id)->delete();    

          // Transaction::where('user_id',$request->id)->delete();

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
