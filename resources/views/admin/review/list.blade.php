@extends('layouts.admin.layout')
@section('content')
@include('admin.review.success')
	
		
		<div class="flex items-center justify-between pt-2 pb-4 border-b" style="border-color: 1px solid #f3f3f3;">
		<h2 class="text-base text-gray-700 font-semibold">{{trans('details.reviews')}}</h2>
     
		<!-- <div class="bg_orange text-lg font-bold text-white  px-2 rounded-full">+</div> -->

		</div>
       
            
            @include('admin.review.search')

		<div class="product_table seller_table bg-white">
		<div>
				  		  	<table class="w-full">
		  		  		<thead>
		  		  			<tr>
		  		  				<!-- <th width="5%"></th> -->
		  		  				<th width="5%">{{trans('details.id')}}</th>
		  		  				<th>{{trans('details.image')}}</th>
		  		  				<th>{{trans('details.name')}}</th>
		  		  				<th width="">{{trans('details.date')}}</th>
		  		  				<th width="30%">{{trans('details.ratings')}}</th>
		  		  				<th width="30%">{{trans('details.status')}}</th>
		  		  				<th width="30%">{{trans('details.edit')}}</th>
		  		  				<th width="5%">{{trans('details.action')}}</th>
		  		  			</tr>
		  		  		</thead>
		  		  		<tbody>

		  		           @foreach($ratingReviews as $ratingReview)
		  		  			<tr>
		  		  				
		  		  				<!-- <td class="px-3 py-3"><input type="checkbox"></td> -->
		  		  				<td class="px-3 py-3">{{$ratingReview->id}}</td>
		  		  				<td class="px-2 py-1"><img src="{{url($ratingReview->product->productgallery[0]->thumbnailimage)}}" class="w-10 h-10"></td>
		  		  				<td class="px-3 py-3">
		  		  					<a href="{{url('admin/product/description/'.$ratingReview->product->slug)}}">	

		  		  					<p class="text-xs text-orange font-semibold">{{$ratingReview->product->name}}</p
		  		  						>
		  		  						</a>
		  		  					</td>
		  		  				<td class="px-3 py-3"><p class="text-xs"><!-- {{date('d-m-Y',strtotime($ratingReview->created_at))}} -->
		  		  				{{$ratingReview->created_at}}</td>
                            <td class="px-3 py-3">
                              <ul class="list-reset flex items-center">
                            	@for($i=1;$i<=5;$i++)

                            	    @if($i<=$ratingReview->rating)
                            			<li class="mr-1"><img src="{{url('/images/icons_1/star_fill.svg')}}" class="w-3 h-3"></li>
                                    
                                    @else
                                         <li class="mr-1"><img src="{{url('/images/icons_1/star_line.svg')}}" class="w-3 h-3"></li>
                                    @endif

                            	@endfor
                              	</ul>

                            </td>
                            <td>
                            	{{$ratingReview->status}}
                            </td>
                          <td class="px-3 py-3">
                      	<form method="post" action="{{url('/admin/reviews/edit')}}" accept-charset="UTF-8">
                      		@csrf
                      		@if($ratingReview->status=="not_approved")
                      		    <input type="hidden" name="id" value="{{$ratingReview->id}}">
                                <input type="submit" class="bg_green rounded py-1 px-2 text-xs text-white cursor-pointer" name="status" value="Approved">
                      		@else
                      		   <input type="hidden" name="id" value="{{$ratingReview->id}}">
                                <input type="submit" class="bg_red rounded px-2  text-xs py-1 text-white cursor-pointer" name="status" value="Not Approved">
                      		@endif

                      		
                      	</form>
                          </td>

                               <td class="px-3 py-3">
                            	<ul class="list-reset flex items-center action_icon"> 
					<li>
					<review-popup url="{{url('')}}" id="{{$ratingReview->id}}">	
					</review-popup>
</li>

<li class="mx-1">
	<a class="del"  rel="{{url('/admin/review/'.$ratingReview->id.'/delete')}}">
		<svg class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" height="512px" viewBox="-47 0 512 512" width="512px"><g><path d="m416.875 114.441406-11.304688-33.886718c-4.304687-12.90625-16.339843-21.578126-29.941406-21.578126h-95.011718v-30.933593c0-15.460938-12.570313-28.042969-28.027344-28.042969h-87.007813c-15.453125 0-28.027343 12.582031-28.027343 28.042969v30.933593h-95.007813c-13.605469 0-25.640625 8.671876-29.945313 21.578126l-11.304687 33.886718c-2.574219 7.714844-1.2695312 16.257813 3.484375 22.855469 4.753906 6.597656 12.445312 10.539063 20.578125 10.539063h11.816406l26.007813 321.605468c1.933594 23.863282 22.183594 42.558594 46.109375 42.558594h204.863281c23.921875 0 44.175781-18.695312 46.105469-42.5625l26.007812-321.601562h6.542969c8.132812 0 15.824219-3.941407 20.578125-10.535157 4.753906-6.597656 6.058594-15.144531 3.484375-22.859375zm-249.320312-84.441406h83.0625v28.976562h-83.0625zm162.804687 437.019531c-.679687 8.402344-7.796875 14.980469-16.203125 14.980469h-204.863281c-8.40625 0-15.523438-6.578125-16.203125-14.980469l-25.816406-319.183593h288.898437zm-298.566406-349.183593 9.269531-27.789063c.210938-.640625.808594-1.070313 1.484375-1.070313h333.082031c.675782 0 1.269532.429688 1.484375 1.070313l9.269531 27.789063zm0 0" data-original="#000000" class="active-path" fill=""/><path d="m282.515625 465.957031c.265625.015625.527344.019531.792969.019531 7.925781 0 14.550781-6.210937 14.964844-14.21875l14.085937-270.398437c.429687-8.273437-5.929687-15.332031-14.199219-15.761719-8.292968-.441406-15.328125 5.925782-15.761718 14.199219l-14.082032 270.398437c-.429687 8.273438 5.925782 15.332032 14.199219 15.761719zm0 0" data-original="#000000" class="active-path" fill=""/><path d="m120.566406 451.792969c.4375 7.996093 7.054688 14.183593 14.964844 14.183593.273438 0 .554688-.007812.832031-.023437 8.269531-.449219 14.609375-7.519531 14.160157-15.792969l-14.753907-270.398437c-.449219-8.273438-7.519531-14.613281-15.792969-14.160157-8.269531.449219-14.609374 7.519532-14.160156 15.792969zm0 0" data-original="#000000" class="active-path" fill=""/><path d="m209.253906 465.976562c8.285156 0 15-6.714843 15-15v-270.398437c0-8.285156-6.714844-15-15-15s-15 6.714844-15 15v270.398437c0 8.285157 6.714844 15 15 15zm0 0" data-original="#000000" class="active-path" fill=""/></g> </svg>

	</a>
</li>

</ul>
                            </td>
</tr>

@endforeach
	</tbody>
		</table>
<div class="custom-paginate py-2">
			{{ $ratingReviews->appends(['search' =>request()->get('search')])->links() }}
	      @if(!count($ratingReviews)>0)
				<p class="text-xs">No Records</p>
			@endif
 </div>
	     </div>
	  </div>
@endsection
@push('scripts')
 
<script>

function change()
{
	var $sort_by=document.getElementById('sort_by').value;
	var $paginate=document.getElementById('paginate').value;
	var $search=document.getElementById('search').value;
    window.location.href="{{url('/admin/reviews?sort_by=')}}"+$sort_by+"&paginate="+$paginate+"&search="+$search;
}


</script> 
 @include('admin.review.warning')

@endpush
