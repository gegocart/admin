@extends('admin.store.details')
@section('tab')
 <div id="tabcontent3" >
		  		      	<ul class="px-1 list-reset text-sm font-medium">
		  		    	<li class="flex py-2 items-center">
		  		    	<p class="w-40">{{trans('store.id')}}</p>
		  		    	<p>{{$store->id}}</p>
		  		    	</li>
		  		    	<li class="flex py-2 items-center">
		  		    	<p class="w-40">{{trans('store.name')}}</p>
		  		    	<p>{{optional($store->users)->name}}</p>
		  		    	</li>
		  		    	<li class="flex py-2 items-center">
		  		    	<p class="w-40">{{trans('store.email')}}</p>
		  		    	<p>{{optional($store->users)->email}}</p>
		  		    	</li>
		  		    	<li class="flex py-2 items-center">
		  		    	<p class="w-40">{{trans('store.usergroup')}}</p>
		  		    	<p class="text-orange font-semibold"><a href="#">{{trans('store.seller')}}</a></p>
		  		    	</li>
		  		    	<li class="flex py-2 items-center">
		  		    	<p class="w-40">{{trans('store.mobile')}}</p>
		  		    	<p>{{$store->users->defaultAddress->mobileno}}</p>
		  		    	</li>
		  		    	<li class="flex py-2 items-center">
		  		    		<p class="w-40">{{trans('store.status')}}</p>
		  		    		@if((($store->users)->status)==1)
		  		    		<span class="bg_green rounded px-1 text-xs text-white">{{trans('store.active')}}</span>
		  		    		@else
		  		    		<span class="bg_red rounded px-1 text-xs text-white">{{trans('store.inactive')}}</span>
		  		    		@endif
		  		    	</li>
		  		    </ul>
		  		    </div>@endsection