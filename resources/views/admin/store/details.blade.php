
@extends('layouts.admin.layout')
@section('content')
	


		<div class="flex items-center justify-between pt-2 pb-4" style="border-color: 1px solid #f3f3f3;">
		<h2 class="text-base text-gray-700 font-semibold">{{trans('store.storedetails')}}</h2>
	<!-- 	<a href="#" class="bg_orange text-white text-sm px-4 py-1 rounded-full">Create Store</a> -->
		</div>
		<div class="w-full">
		<div class="flex items-center justify-between">
		   	<p class="text-sm text-gray-700 px-1 font-semibold">{{trans('store.id')}}  :{{$store->id}}</p>
		   	<div class="flex justify-end my-2">
		   @if($preStore->slug!="")

		   	  <a href="{{url('/admin/store/profile/'.$preStore->slug)}}" class="rounded-full p-2 arrow_icon border border-transparent"><img src="{{url('/images/icons_1/left-arrow.svg')}}" class="w-3 h-3"></a>
		   @else
              <a href="#" class="rounded-full p-2 arrow_icon border border-transparent"><img src="{{url('/images/icons_1/left-arrow.svg')}}" class="w-3 h-3"></a>
		   @endif
		    @if($nextStore->slug!="")
		    	 <a href="{{url('/admin/store/profile/'.$nextStore->slug)}}" class="rounded-full p-2 arrow_icon border border-transparent"><img src="{{url('/images/icons_1/right-arrow.svg')}}" class="w-3 h-3"></a>

            @else  
		   		<a href="#" class="rounded-full p-2 arrow_icon border border-transparent"><img src="{{url('/images/icons_1/right-arrow.svg')}}" class="w-3 h-3"></a>

		   @endif 
		   	</div>
		   	</div>
		<div class="bg-white text-sm custom_txt custom_shadow py-3 px-3 rounded">
		  <div class="flex justify-between pb-2">
		   		<div class="flex items-center ">
		   			<div class="relative">
		   			<img src="{{url('/images/store.jpg')}}" class="rounded-full w-16 h-16 custom_shadow">
		   			<div class="relative">
		   			<!-- <img src="images/icons_1/camera.svg" class="w-3 h-3"> -->

		   		@if($store->status==1)
		   		<a href="#" class=" p-1 mt-1 rounded-full absolute bottom-0 right-0">
		   			<span class="w-3 h-3 rounded-full inline-block bg_green ml-1"></span>
		   			</a>
		   		@endif
		   		<!-- 	<input type="file" name="" class="opacity-0 file_upload"> -->
		   			</div>
		   			</div>
		   			<div class="leading-relaxed  mx-5">
		   			<p class="text-lg text-orange font-medium">{{$store->name}}</p>
		   			<p>{{$store->slug}}</p>
		   			</div>
		   		</div>
		   		<div class="w-1/3">
		   			<ul class="list-reset leading-loose">
		   				<a href="{{url('/admin/seller/'.$store->users->id.'/details')}}"> 
		   				<li >{{trans('store.sellername')}} : {{$store->users->name}}


					
                 </li>
                 </a>

		   				<li>{{trans('store.email')}} : {{optional($store->users)->email}}</li>

		   				<li>@if($store->users->email_verified_at!="")
		   						<span class="bg_green rounded px-1 text-xs text-white">{{trans('details.verified')}}</span>
		   					@else
		   						<span class="bg_red rounded px-1 text-xs text-white">{{trans('details.unverified')}}</span>
		   					@endif </li>
		   			</ul>
		   			<!-- <ul class="list-reset leading-loose px-5">
		   			<li>Country : India</li>
		   			<li>Mobile : 9874563210</li>	
		   			</ul> -->
		   		</div>
		   		<!-- <div class="">
		   		<div class="flex items-center relative">
		   		<a href="#" onclick="show_option('more-option')" class="mx-1 px-2 py-2 rounded-full bg-light border"  class=""><img src="images/icons_1/more_icon.svg" class="w-3 h-3"></a>
		   		<div id="more-option" class="hidden bg-white shadow rounded px-2 py-1 absolute border custom_border right-0 w-20">
		   			<ul class="list-reset text-sm leading-loose">
		   				<li><a href="#">{{trans('store.editstore')}}</a></li>
		   				<li><a href="#">{{trans('store.deletestore')}}</a></li>
		   			</ul>
		   		</div>
		   		</div>	
		   		</div> -->
		   	</div>
		</div>

	<!-- ********************** -->
	<div class="bg-white text-sm custom_txt custom_shadow py-3 px-3 rounded my-4">
		@include('admin.store.tab')
		  	<div class="py-5 custom_tab_content">
               @yield('tab')

</div>
</div>
</div>
@endsection

<!-- main section end -->
