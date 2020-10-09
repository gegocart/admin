<?php

namespace App\Http\Controllers\Admin\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Http\Requests\Admin\Seller\AddressRequest;
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {


       $paginate=$request->paginate==null?'10':$request->paginate;
        $orderby=$request->sort_by==null?'asc':$request->sort_by;

        $addresses=Address::where('user_id',$id)->orderby('id',$orderby)->paginate($paginate);

        $addresses=$addresses->appends(array('sort_by' =>request('sort_by'),
                                 'paginate'=>request('paginate'),
                                 'search'=>request('search'),
                               ));
         
         return view('admin.seller.address.list',[
            'userid'=>$id,
            'addresses'=>$addresses,
         ]);
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
    public function store(Request $request)
    {
        //
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
    public function edit($userid,$id)
    {

      $address=Address::where('id',$id)->first();
      $cities=City::get();
      $states=State::get();
      $countries=Country::get();
     
      return view('admin.seller.address.edit',[
        'address'=>$address,
        'cities'=>$cities,
        'states'=>$states,
        'userid'=>$userid,
        'countries'=>$countries,
          
      ]);
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddressRequest $request,$userid,$id)
    {

        $address=Address::where('id',$id)->first();


       
        $address->update([
              'firstname'=>$request->firstname,
              'lastname'=>$request->lastname!=''?$request->lastname:'',
              'mobileno'=>$request->mobileno!=''?$request->mobileno:'',
              'address_1'=>$request->address_1,
              'address_2'=>$request->address_2,
              'city_id'=>$request->city_id,
              'state_id'=>$request->state_id,
              'country_id'=>$request->country_id,
              'postal_code'=>$request->pincode,
              'default'=>$request->default,
 
          ]);

    return redirect()->back()->with(['success'=>'Address updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        
        Address::where('id',$id)->delete();
        return redirect()->back()->with(['success'=>'Address delete successfully']);

    }
}
