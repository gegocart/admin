@extends('admin.product.details')
@section('tab')

<div id="tabcontent2" >
	  @foreach($product->rating as $ratingReview)
		  	<div class="flex flex-col lg:flex-row my-2">
		  		<div class="w-full lg:w-1/12 ">
		  			@if($ratingReview->user->image!="")
		   			<img src="{{url('/profile/'.$ratingReview->user->image)}}" class="rounded-full w-12 h-12 mx-auto">
		   		@else
		   			<img src="{{url('/profile/default.png')}}" class="rounded-full w-12 h-12 mx-auto">
		   		@endif
		  		 
		  		<p class="text-xs text-gray-800 text-center">{{$ratingReview->user->name}}</p>
		  		</div>
		  		<div class="mx-3 my-1 w-full lg:w-11/12">
		  			<ul class="list-reset flex items-center">
                            		@for($i=1;$i<=5;$i++)

	                            	    @if($i<=$ratingReview->rating)
	                            			<li class="mr-1"><img src="{{url('/images/icons_1/star_fill.svg')}}" class="w-3 h-3"></li>
	                                    
	                                    @else
	                                         <li class="mr-1"><img src="{{url('/images/icons_1/star_line.svg')}}" class="w-3 h-3"></li>
	                                    @endif

                            	@endfor
                	</ul>
                	<p class="text-sm text-gray-700 leading-relaxed py-3">{{$ratingReview->description}} </p>
		  		</div>
		  	</div>

		  @endforeach
		  </div>
 @endsection