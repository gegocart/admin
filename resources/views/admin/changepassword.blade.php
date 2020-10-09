@extends('layouts.admin.layout')
@section('content')
@include('admin.success')
<div class="">
  
   
     
     		<h2 class="text-base text-gray-700 font-semibold py-2">{{trans('changepassword.changepassword')}}</h2>
     	   <div class="bg-white  rounded px-2 py-4 my-3">
            <div class="lg:mx-3 md:mx-3 w-full lg:w-1/2 md:w-1/2">
	<form method="post" enctype="multipart/form-data">
		@csrf
	    <div class="py-4">
                <div class="flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                  
                    <span class="text-2xl lg:text-sm">{{trans('changepassword.oldpassword')}}</span>
                    </label>
                      <input name="oldpassword" type="password" class="form-control w-full py-2 px-2 border text-2xl lg:text-sm"> 
                        <p class="text-xs text-red-600"> {{$errors->first('oldpassword')}}</p> 
                 </div>
        </div>
<div class="py-4">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                
                    <span class="text-2xl lg:text-sm">{{trans('changepassword.newpassword')}}</span>
                    </label>
                        <input name="password"    type="password" class="form-control w-full py-2 px-2 border text-2xl lg:text-sm"> 
                 <p class="text-xs text-red-600"> {{$errors->first('password')}}</p> 
                 </div>

 </div>
 <div class="py-4">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block  my-1 custom-label">
                  
                    <span class="text-2xl lg:text-sm">{{trans('changepassword.confirmnewpassword')}}</span>
                    </label>
                            <input name="password_confirmation"    type="password" class="form-control w-full py-2 px-2 border text-2xl lg:text-sm"> 
                 </div>

 </div>
 
  <div class="pt-3 px-4 flex items-center">
    <button class="focus:outline-none bg_orange text-white text-2xl lg:text-sm px-8 py-2 rounded-full custom_shadow login_btn">{{trans('changepassword.submit')}}</button>
    <a href=" " class="mx-2 bg-gray-300 hover:bg-gray-400 text-black text-2xl lg:text-sm px-8 py-2 rounded-full">{{trans('changepassword.reset')}}</a>
 </div>


    </form>
 </div>
 </div>

</div>

@endsection