@extends('layouts.admin.blank')
@section('content')
    
     <div class="w-full lg:w-1/3 mx-auto bg-white  login-form rounded px-5 py-4 my-10">
     <div class="mx-5">
     	<div class="py-4">
     		<a href="#"><img src="images/gegocart-logo.png" class="h-10 mx-auto"></a>
     	</div>
     	<div class="">
               <form method="post" action="{{url('/')}}">
                    @csrf
     		   <form>
     			<div class="py-4">
     				<label class="form-group block relative">
     				<input type="email" value="{{old('email')}}" class="form-control w-full" name="email"> 
     				<span class="text-2xl lg:text-xs mx-2">E-mail</span>
                          @if ($errors->has('email'))
                                    <p class="invalid-feedback" role="alert">
                                        <strong class="text-xs text-red my-2 text-red-500">{{ $errors->first('email') }}</strong>
                                    </p>
                                @endif
     				</label>
     			</div>
     			<div class="py-4">
     				<label class="form-group block relative">
     				<input type="password" class="form-control w-full" name="password"> 
     				<span class="text-2xl lg:text-xs mx-2">Password</span>
                           @if ($errors->has('password'))
                                    <p class="invalid-feedback" role="alert">
                                        <strong class="text-xs text-red my-2 text-red-500">{{ $errors->first('password') }}</strong>
                                    </p>
                                @endif
     				</label>
     			</div>
     			<div class="py-4">
     			<div class="flex items-center justify-between">
     				<a href="{{url('/forgetpassword')}}" class="text-2xl lg:text-xs">Forget Password ?</a>
     			</div>
     			</div>
     			<div class="pt-3">
     				<button class="bg_orange text-white text-2xl lg:text-sm px-8 py-2 rounded-full custom_shadow login_btn focus:outline-none">LOGIN</button>
     			</div>
     		</form>
     	</div>
     	</div>
     </div>
     @endsection