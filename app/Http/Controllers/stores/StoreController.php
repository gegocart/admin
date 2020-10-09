<?php

namespace App\Http\Controllers\stores;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Product;
use App\Http\Resources\StoreIndexResource;
use App\Http\Resources\UserStoreResource;
use App\Http\Requests\Stores\StoreRequest;
use App\Http\Requests\Stores\EditStoreRequest;
use Illuminate\Database\Query\Builder;
use Exception;
use App\Traits\Common;
use Illuminate\Support\Facades\Auth;
use App\Traits\LogActivity;
use App\Traits\ProductDelete_Process;
 
 class StoreController extends Controller
{
    use Common,LogActivity;
    use ProductDelete_Process;

    public function searchstores(Request $request) //seller
    {
           
        $search=$request->name;

        
      if($search!="" || $search!=null)
        {

          $stores = Store::where('user_id',Auth::id())->Where(function($query) use ($search){
            $query->orWhere('slug','LIKE',$search.'%')->orWhere('name','LIKE',$search.'%');
          });


          if(count($stores)>0)
          {
             $stores =$stores->paginate(15);
             return StoreIndexResource::collection($stores); 
          }
      
        }
        else{
          $stores = Store::where('user_id',auth()->user()->id)->paginate(15);
           return StoreIndexResource::collection($stores); 
        }
    
    }
    
    public function mystores(Request $request) //seller
    {

        $show=(int)$request->show;
        if($show!=0){
          $stores = Store::where('user_id',auth()->user()->id)->paginate($show); //->where('status', 1)
        }
        else{
          $stores = Store::where('user_id',auth()->user()->id)->paginate(15); //->where('status', 1)
        }
    
        return StoreIndexResource::collection($stores);
    }
 
    
   public function store(StoreRequest $request)
    {
      $res=[];
    	 try
        {

          if($request->hasFile('storelogo'))
           {
             $imagepathlogo=$this->uploadFile('uploads/storeimage/logo/',$request->storelogo);
              $store->storelogo=$imagepathlogo;
           }
           if($request->hasFile('storeimage'))
            {
               
                $imagepathcover=$this->uploadFile('uploads/storeimage/',$request->storeimage);
                  $store->storeimage=$imagepathcover;
            }
            
          
            $store= new Store;
            $store->user_id=Auth::id();
            $store->name=$request->name;
            $store->slug=$request->slug;
            $store->status=$request->status;
            $store->description=$request->description;
            $store->keywords=$request->keywords;
            $store->address=$request->address;
       
            $store->storelogo=$imagepathlogo;
            $store->storeimage=$imagepathcover;
         // $store->address=$request->address;
            $store->save();
          

  try{
        $ip = $this->getRequestIP();
        $this->doActivityLog(                                    
          $store,
          Auth::user(),
          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
          'LOGNAME_STORE_STORED',
          'Store Stored'
        );

     }
    catch(Exception $e)
          {
             
           
          }
                  return response()->json(['success'=>true,'message'=>'Saved'],200);
          

        }
       catch(Exception $e)
       {
   
             return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
       }
        
    }


    public function edit($id)
    {
       $store=Store::where('id',$id)->first();
       if(is_null($store))
       {
          return response()->json(['error'=>422,'message'=>'Unprocessable Entity'],422);
       }
       elseif(auth()->user()->id!=$store->user_id)
       {
          return response()->json(['error'=>403,'message'=>'Forbidden'],403);
       }
       return $store;

    }

    public function update(EditStoreRequest $request, $id)
    {
      
      $res=[];
      $imagepathlogo='';
      $imagepathcover='';

       try
       {

          if (Store::where('name', $request->name)->where('id','!=',$id)->first())
          {
            return response()->json(['success'=>false,'message'=>'Name Already Exists.'],200);
                 
          }
           $store=Store::find($id);

              if(is_null($store))
               {
                  return response()->json(['error'=>422,'message'=>'Unprocessable Entity'],422);
               }
               elseif(auth()->user()->id!=$store->user_id){
                   return response()->json(['error'=>403,'message'=>'Forbidden'],403);
               }
               else
               {

                 $store->name=$request->name;
                // $store->slug=$request->slug;
                 $store->status=$request->status;
                 $store->description=$request->description;
                 $store->keywords=$request->keywords;
                 $store->address=$request->address;

                 if($request->hasFile('storelogo'))
                 {
                   $imagepathlogo=$this->uploadFile('uploads/storeimage/logo/',$request->storelogo);
                    $store->storelogo=$imagepathlogo;
                 }
                 if($request->hasFile('storeimage'))
                  {
                     
                      $imagepathcover=$this->uploadFile('uploads/storeimage/',$request->storeimage);
                        $store->storeimage=$imagepathcover;
                  }

                 $store->save();

  try{
        $ip = $this->getRequestIP();
        $this->doActivityLog(                                    
          $store,
          Auth::user(),
          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
          'LOGNAME_STORE_UPDATED',
          'Stored Updated'
        );

     }
    catch(Exception $e)
          {
             
            //dd($e->getMessage());
          }
                return response()->json(['success'=>true,'message'=>'Updated'],200);
           
         }

       }
       catch(Exception $e)
       {
        
           return response()->json(['success'=>false,'message'=>'Unprocessable Entity' .$e->getMessage()],422);
       }


    }

    public function destroy($id)
    {
      $res=[];
        try {
            
               $store=Store::where('id',$id)->first();
               if(is_null($store))
               {
                  return response()->json(['error'=>422,'message'=>'Unprocessable Entity'],422);
               }
               elseif(auth()->user()->id!=$store->user_id){
                   return response()->json(['error'=>403,'message'=>'Forbidden'],403);
                }
                else
                {
                
                $product=Product::where('store_id',$store->id)->pluck('id')->toArray();
                
                if(count($product)>0)
                {
                  $this->deleteProductGallery($product);
                  // $this->deleteProductVariation($product);
                   //$this->deleteAttributeProduct($product);
                   //$this->deleteCategoryProduct($product);
                   $this->deleteProduct($product);
                }
                        
                $store->delete();
                 
                 return response()->json(['success'=>true,'message'=>'Deleted Successfully'],200);
                  
                }
           } 
        catch (Exception $e) 
        {

             return response()->json(['success'=>false,'message'=>$e->getMessage()],422);
        }        

    }
}
