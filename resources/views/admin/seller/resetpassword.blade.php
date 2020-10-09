@extends('layouts.admin.layout')
@section('content')

<div class="main ">

     <div class="py-20 min-h-screen ">
     <div class="w-1/3 mx-auto bg-white  login-form rounded px-5 py-4 my-10">
     <div class="mx-5">
     	<div class="py-4">
     		<a href="#"><img src="{{url('images/gegocart-logo.png')}}" class="h-10 mx-auto"></a>
     	</div>
     	<div class="">
     		<!-- <h3>Login</h3> -->
     		<form >
     		 @csrf
     			<!-- <div class="my-3">
     				<label class="form-group block relative">
     				<input type="text" class="form-control w-full"> 
     				<span class="text-xs mx-2">Name</span>
     				</label>
     			</div> -->
     			<div class="py-4">
     				<label class="form-group block relative">
     				<input id="email" type="text" class="form-control  w-full" name="email"> 
     				<span class="text-xs mx-2">E-mail</span>
     				</label>
     			</div>
     			<div class="py-4">
     				<label class="form-group block relative">
     				<input id="password" type="password" name="password" class="form-control w-full"> 
     				<span class="text-xs mx-2">Password</span>
     				</label>
     			</div>
     			
     
     			<div class="pt-3">
     				<button onclick="resetpassword()" class="btn-submit bg_orange text-white text-sm px-8 py-2 rounded-full custom_shadow ">Submit</button>
     			</div>
     		</form>
     	</div>
     	</div>
     </div>
     </div>
	</div>
@endsection	
 @push('scripts')
<script>
     $.ajaxSetup({

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
	 function resetpassword(){
         var name = "{{$user->name}}";
        var password = $("#password").val();
        var email = $("#emil").val();
        

           $.ajax({

           type:'POST',

           url:'/admin/buyer/resetpassword',
  
           data:{name:name, password:password, email:email},

           success:function(data){

              console.log(data);

           }


        });
  }
</script>
@endpush