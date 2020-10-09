@extends('layouts.admin.blank')
@section('content')

     <div class="w-full lg:w-1/3 mx-auto">
     @include('admin.success')
   
     @include('admin.error')
    
     <div class=" bg-white  login-form rounded px-5 py-4 my-5">
     <div class="mx-5">
      <h4 class="uppercase my-4 text-center text-shop-primary font-semibold">{{trans('forgetpassword.headline')}}</h4>
                <p class="text-2xl lg:text-sm text-grey-dark text-justify">{{trans('forgetpassword.description')}}</p>
        <div class="">
               <form method="post">
                    @csrf
                <div class="py-4">
                    <label class="form-group block relative">
                    <input type="text" class="form-control w-full" name="email"> 
                    <span class="text-2xl lg:text-xs mx-2">E-mail</span>
                          @if ($errors->has('email'))
                                    <p class="invalid-feedback" role="alert">
                                        <strong class="text-xs text-red my-2 text-red-500">{{ $errors->first('email') }}</strong>
                                    </p>
                         @endif
                    </label>
                </div>
                <div class="pt-3 flex justify-between">
                    <button class="bg_orange text-white text-xl lg:text-sm px-8 py-2 rounded-full custom_shadow login_btn">Submit</button>
                    <a href="{{url('/')}}">sign in</a>
                </div>
            </form>
        </div>
        </div>
     </div>
     </div>
     @endsection