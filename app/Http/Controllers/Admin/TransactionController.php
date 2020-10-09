<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class TransactionController extends Controller
{
    //
    public function index(Request $request)
    {
        $paginate=$request->paginate==null?'10':$request->paginate;
        $orderby=$request->sort_by==null?'asc':$request->sort_by;
        $transactions=Transaction::with('user');
           $search=$request->search;
           if($search!="")
           { 
                $transactions=$transactions->where(function($query) use ($search){
                   $query->orWhere('comment','LIKE',$search.'%')->orWhere('amount',$search)->orwhereHas('user',function($q)use ($search){
                        $q->Where('name','LIKE',$search.'%');
                    });
                });
           }
           $transactions=$transactions->orderby('id',$orderby)->paginate($paginate);
            $transactions=$transactions->appends(array('sort_by' =>request('sort_by'),
                                 'paginate'=>request('paginate'),
                                 'search'=>request('search'),
                               ));
        return view('admin.transaction.list',[
            'transactions'=>$transactions,
       ]);
    }
    public function pending()
    {  
           
         $pending=Transaction::with('users')->where('status','pending')->paginate(10);
         return view('admin.transaction.pendinglist',['pending'=>$pending]);
      
    }
    public function approve()
    {  
             $approve=Transaction::with('users')->where('status','approve')->paginate(10);
         return view('admin.transaction.approvelist',['approve'=>$approve]);
      
    }
    public function cancel()
    {  
             $cancel=Transaction::with('users')->where('status','cancel')->paginate(10);
         return view('admin.transaction.cancellist',['cancel'=>$cancel]);
      
    }
     public function view($slug)
    {  
       // dd($slug);
             $transaction=Transaction::with('users')->where('slug',$slug)->first();
         return view('admin.store.details',['transaction'=>$transaction]);
      
    }
    
     

}
