]@extends('layouts.admin.layout')
@section('content')
<div class="">
  

        <h2 class="text-base text-gray-700 font-semibold py-2">{{trans('adduser.addsellerform')}}</h2>
        <div class="bg-white  rounded px-2 py-4 my-3">
            <div class="lg:mx-3 md:mx-3">
      
        <div class="">
    <form method="post">
        @csrf
    <div class="py-4">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                 
                    <span class="text-sm">{{trans('adduser.username')}}</span>
                    </label>
                       <input name="name"  value="{{ old('name') }}" type="text" class="form-control w-full py-2 px-2 border text-sm"> 
                        <p class="text-xs text-red-600"> {{$errors->first('name')}}</p> 
                 </div>

 </div>
 <div class="py-4">
            <div class="  flex flex-col px-4">
                    
                    <label class="form-group block my-1 custom-label">
                  
                    <span class="text-sm">{{trans('adduser.emailid')}}</span>
                    </label>
                    <input name="email" value="{{ old('email') }}" type="text" class="form-control w-full py-2 px-2 border text-sm"> 
                      <p class="text-xs text-red-600">{{$errors->first('email')}}</p>
             </div>

 </div>
 

 <div class="py-4">
              <div class="  flex flex-col px-4">
       
                    <label class="form-group block my-1 custom-label">
                   
                    <span class="text-sm">{{trans('adduser.password')}} </span>
                    </label>
                     <input name="password" type="password" class="form-control w-full py-2 px-2 border text-sm" value=""> 
                         <p class="text-xs text-red-600"> {{$errors->first('password')}}</p> 
              </div>


 </div>

 <div class="py-4">

               <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                    
                    <span class="text-sm">{{trans('adduser.confirmpassword')}}</span>
                    </label>
                         <input name="password_confirmation" type="password" class="form-control w-full py-2 px-2 border text-sm" value="">    
              </div>
 </div>
  
 <div class="pt-3 px-4">
                    <button class="  bg_orange text-white text-sm px-8 py-2 rounded-full custom_shadow login_btn">{{trans('adduser.submit')}}</button>
                 
 </div>

    </form>
   </div>
</div>
</div>

</div>

@endsection