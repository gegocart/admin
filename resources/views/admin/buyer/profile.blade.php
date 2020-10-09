@extends('admin.buyer.details')
@section('tab')

               <div id="tabcontent5" class="box ">
		  		    <ul class="px-1 list-reset text-sm font-medium">
		  		    	<li class="flex py-2 items-center">
		  		    	<p class="w-40">{{trans('details.id')}}</p>
		  		    	<p class="w-full">{{$user->id}}</p>
		  		    	</li>
		  		    	<li class="flex py-2 items-center">
		  		    	<p class="w-40">{{trans('details.name')}}</p>
		  		    	<p class="w-full">{{$user->defaultAddress->firstname.' '.$user->defaultAddress->lastname}}</p>
		  		    	</li>
		  		    	<li class="flex py-2 items-center">
		  		    	<p class="w-40">{{trans('details.email')}}</p>
		  		    	<p class="w-full">{{$user->email}}</p>
		  		    	</li>
		  		    	<li class="flex py-2 items-center">
		  		    	<p class="w-40">{{trans('details.usergroup')}}</p>
		  		    	<p class="text-orange font-semibold w-full"><a href="#">{{$user->usergroup->name}}</a></p>
		  		    	</li>
		  		    	<li class="flex py-2 items-center">
		  		    	<p class="w-40">{{trans('details.mobile')}}</p>
		  		    	<p class="w-full">{{$user->defaultAddress->mobileno}}</p>
		  		    	</li>
		  		    	<li class="flex py-2 items-center">
		  		    		<p class="w-40">Status</p>
		  		    		
		  		    		@if($user->status==1)
		  		    		   <p class="w-full"><span class="bg_green rounded px-1 text-xs text-white">{{trans('details.active')}}</span></p>
		  		    		@else
		  		    			<span class="bg_red rounded px-1 text-xs text-white">{{trans('details.inactive')}}</span>
		  		    		@endif

		  		    	</li>
		  		    </ul>
		  		    </div>
@endsection		  	