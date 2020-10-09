@extends('layouts.admin.layout')
@section('content')
@include('admin.buyer.success')
<div class="">
  
   
     
     		<h2 class="text-base text-gray-700 font-semibold py-2">{{trans('edituser.addressedit')}}</h2>
     	   <div class="bg-white  rounded px-2 py-4 my-3">
            <div class="mx-5">
     	<div class="">
	<form method="post" enctype="multipart/form-data">
		@csrf
  
 <div class="py-4">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                  
                    <span class="text-sm">{{trans('edituser.firstname')}}</span>
                    </label>
                      <input name="firstname" value="{{old('firstname',optional($address)->firstname)}}" type="text" class="form-control w-full py-2 px-2 border text-sm"> 
                        <p class="text-xs text-red-600"> {{$errors->first('firstname')}}</p> 
                 </div>

 </div>

<input type="hidden" name="address_id" value="{{$address->id}}">

 <div class="py-4">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                  
                    <span class="text-sm">{{trans('edituser.lastname')}}</span>
                    </label>
                      <input name="lastname" value="{{old('lastname',optional($address)->lastname)}}" type="text" class="form-control w-full py-2 px-2 border text-sm"> 
                        <p class="text-xs text-red-600"> {{$errors->first('lastname')}}</p> 
                 </div>

 </div>
 <div class="py-4">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                  
                    <span class="text-sm">{{trans('edituser.mobileno')}}</span>
                    </label>
                      <input name="mobileno" value="{{old('mobileno',optional($address)->mobileno)}}" type="text" class="form-control w-full py-2 px-2 border text-sm"> 
                        <p class="text-xs text-red-600"> {{$errors->first('mobileno')}}</p> 
                 </div>

 </div>
  <div class="py-4">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                  
                    <span class="text-sm">{{trans('edituser.address')}}</span>
                    </label>
                      <input type="text"  name="address_1" class="form-control w-full py-2 px-2 border text-sm" value="{{old('address_1',optional($address)->address_1)}}">
                    
                        <p class="text-xs text-red-600"> {{$errors->first('address_1')}}</p> 
                 </div>

 </div>
   <div class="py-4">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                  
                    
                    </label>
                      <input type="text"  name="address_2" class="form-control w-full py-2 px-2 border text-sm" value="{{old('address_2',optional($address)->address_2)}}">
                         
                        <p class="text-xs text-red-600"> {{$errors->first('address_2')}}</p> 
                 </div>

 </div>
 <div class="py-4">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                  
                    <span class="text-sm">{{trans('edituser.city')}}</span>
                    </label>
                   <select class="border" name="city_id">

                    @foreach($cities as $city)
                       <option value="{{$city->id}}" {{old('city_id',optional($address)->city_id)=="$city->id"? 'selected':''}}>{{$city->name}} </option>
                    @endforeach
                   </select>

                <p class="text-xs text-red-600"> {{$errors->first('city_id')}}</p> 
                 </div>

</div>
 <div class="py-4">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                  
                    <span class="text-sm">{{trans('edituser.state')}}</span>
                    </label>
                   <select class="border" name="state_id">

                    @foreach($states as $state)
                       <option value="{{$state->id}}" {{old('state_id',optional($address)->state_id)=="$state->id"? 'selected':''}}>{{$state->name}} </option>
                    @endforeach
                   </select>

                <p class="text-xs text-red-600"> {{$errors->first('state_id')}}</p> 
                 </div>

</div>
 <div class="py-4">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                  
                    <span class="text-sm">{{trans('edituser.country')}}</span>
                    </label>
                   <select class="border" name="country_id">

                    @foreach($countries as $country)
                       <option value="{{$country->id}}" {{old('country_id',optional($address)->country_id)=="$country->id"? 'selected':''}}>{{$country->name}} </option>
                    @endforeach
                   </select>

                <p class="text-xs text-red-600"> {{$errors->first('country_id')}}</p> 
                 </div>

</div>
<div class="py-4">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                  {{trans('edituser.pincode')}}
                    
                    </label>
                      <input type="number" placeholder="6 digit (0 to 9)"  name="pincode" class="form-control w-full py-2 px-2 border text-sm" value="{{old('pincode',optional($address)->postal_code)}}">
                         
                        <p class="text-xs text-red-600"> {{$errors->first('pincode')}}</p> 
                 </div>

 </div>
 <div class="py-4">
   <div class="  flex flex-col px-4">
      <label class="form-group block block custom-label">
                    <span class="text-sm">{{trans('edituser.default')}}</span>
                    <div class="flex my-2">
                    <input class="self-center m-2" type="radio" name="default" value="1"
                      {{old('default',optional($address)->default)==1?'checked':''}}
                     >
                    <h4>{{trans('edituser.yes')}}</h4>
                    <input class="self-center mx-2" type="radio" name="default" value="0" {{old('default',optional($address)->default)==0?'checked':''}}>
                    <h4>{{trans('edituser.no')}}</h4>
                    </div>
                    </label>   
                     <p class="text-xs text-red-600"> {{$errors->first('default')}}</p> 
   </div>
   <input type="hidden" value="{{$userid}}" name="userid">
 </div>
  <div class="pt-3 px-4 flex items-center">
                    <button class="  bg_orange text-white text-sm px-8 py-2 rounded-full custom_shadow login_btn">{{trans('edituser.submit')}}</button>
                     <div class=" mx-2 bg-white   text-black text-sm px-8 py-2 rounded-full custom_shadow   "><a href=" " class='btn btn-default'>{{trans('edituser.reset')}}</a></div>

 </div>


    </form>
   </div>
 </div>
 </div>

</div>

@endsection
