@extends('layouts.admin.layout')
@section('content')

<div class="">
              
        <h2 class="text-base text-gray-700 font-semibold py-2">{{trans('paymentmethod.addpaymentmethod')}}</h2>
        <div class="bg-white  rounded px-2 py-4 my-3">
            <div class="mx-5">
      
        <div class="">
    <form method="post">
        @csrf
   <div class="py-4">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                 
                    <span class="text-sm">{{trans('paymentmethod.gatewayname')}}</span>
                    </label>
                       <input name="gatewayname"  value="{{ old('gatewayname') }}" type="text" class="form-control w-full py-2 px-2 border text-sm"> 
                        <p class="text-xs text-red-600"> {{$errors->first('gatewayname')}}</p> 
                 </div>

 </div>
 <div class="py-4">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                 
                    <span class="text-sm">{{trans('paymentmethod.cardtype')}}</span>
                    </label>
                       <input name="cardtype"  value="{{ old('cardtype') }}" type="text" class="form-control w-full py-2 px-2 border text-sm"> 
                        <p class="text-xs text-red-600"> {{$errors->first('cardtype')}}</p> 
                 </div>

 </div>
 <div class="  flex flex-col px-4">
      <label class="form-group block block custom-label">
                    <span class="text-sm">{{trans('paymentmethod.status')}}</span>
                    <div class="flex my-2">
                    <input class="self-center m-2" type="radio" name="active" value="1"
                      
                     checked="true">
                    <h4>{{trans('paymentmethod.yes')}}</h4>
                    <input class="self-center mx-2" type="radio" name="active" value="0">
                    <h4>{{trans('paymentmethod.no')}}</h4>
                    </div>
                    </label>   
                     <p class="text-xs text-red-600"> {{$errors->first('active')}}</p> 
   </div>
 
 
 
  <div class="pt-3 px-4">
                    <button class="focus:outline-none bg_orange text-white text-sm px-8 py-2 rounded-full custom_shadow login_btn">{{trans('paymentmethod.submit')}}</button>
                 
 </div>
</form>
    </div>
   </div>

</div>
 

 
@endsection