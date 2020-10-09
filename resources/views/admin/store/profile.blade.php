@extends('admin.store.details')
@section('tab')
		  <div id="tabcontent1" class="active">
		  		    <ul class="px-1 list-reset text-sm font-medium">
		  		    	<li class="flex py-2 items-center">
		  		    	<p class="w-40">ID</p>
		  		    	<p>{{$store->id}}</p>
		  		    	</li>
		  		    	<li class="flex py-2 items-center">
		  		    	<p class="w-40">Name</p>
		  		    	<p>{{$store->name}}</p>
		  		    	</li>
		  		    	<li class="flex py-2 items-center">
		  		    	<p class="w-40">Slug</p>
		  		    	<p>{{$store->slug}}</p>
		  		    	</li>
		  		    	<li class="flex py-2 items-center">
		  		    	<p class="w-40">Keywords</p>
		  		    	<p>{{$store->keywords}}</p>
		  		    	</li>
		  		    	<li class="flex py-2 items-center">
		  		    		<p class="w-40">Address</p>
		  		    		<p>{{$store->address}}</p>
		  		    	</li>
		  		    	<li class="flex py-2 items-center">
		  		    		<p class="w-40">Status</p>
		  		    		  @if($store->status=="1")
	  				           <span class="bg_green rounded px-1 text-xs text-white"> Active</span>
                            @else
                             <span class="bg_red rounded px-1 text-xs text-white">Inactive</span>
                            @endif</span>
		  		    	</li>
		  		    	
		  		    </ul>
		  		    </div>
@endsection