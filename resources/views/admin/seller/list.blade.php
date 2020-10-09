@extends('layouts.admin.layout')
@section('content')
@include('admin.seller.success')
 @include('admin.seller.filter')
	
		<div class="seller_table bg-white">
		<div class="my-5">
			<table class="w-full">
				<thead>
					<tr>
						<th>{{trans('sellerlist.name')}}</th>
						<th>{{trans('sellerlist.store')}}</th>
						<th>{{trans('sellerlist.orders')}}</th>
						<th>{{trans('sellerlist.invoice')}}</th>
						<th>{{trans('sellerlist.actions')}}</th>
					</tr>
				</thead>
			
			<tbody>

				@foreach($sellers as $seller)
			<tr class="seller_list rounded  bg-white">
			<td class="px-3 py-3">
			    <div class="flex items-center ">
				<div>
					
				@if($seller->image!="")
		   			<img src="{{url($seller->image)}}" class="w-8 h-8 rounded-full">
		   		@else
		   			<img src="{{url('/profile/default.png')}}" class="w-8 h-8 rounded-full">
		   		@endif

				</div>
					<a href="{{url('/admin/seller/'.$seller->id.'/details')}}">
				<div class="text-gray-700 mx-2 leading-relaxed">
					<p class="text-xs text-orange font-semibold">{{$seller->name}}</p>
					<p class="text-xs">{{$seller->email}}</p>
				</div>
			</a>
				</div>
				
			</td>
			<td class="px-3 py-3">
				<p class="text-sm">{{$seller->mystores->count()}}</p>
			</td>
			
			<td class="px-3 py-3">
				<p class="text-sm">{{$seller->orderItem->count()}} </p>
			</td>
			<td class="px-3 py-3">
				<p class="text-sm">
					@if($seller->invoice->user_id!="")

					<a href="{{url('/admin/seller/'.$seller->id.'/invoice/download')}}">download</a>
					@else
					  No Invoice
					@endif
				</p>
			</td>
			<td class="px-3 py-3">
				<ul class="list-reset flex items-center action_icon"> 
					<li>
					<a href="{{url('/admin/seller/'.$seller->id.'/details')}}">
					<svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve" width="512px" height="512px"><g><g>
	<g>
		<g>
			<path d="M501.978,371.851l-141.999-50c-7.811-2.753-16.379,1.352-19.13,9.167c-2.752,7.814,1.353,16.379,9.167,19.13l141.999,50     c7.837,2.759,16.388-1.378,19.13-9.167C513.897,383.167,509.792,374.602,501.978,371.851z" data-original="#000000" class="active-path" fill=""/>
			<path d="M227.595,99.398c12.248-14.593,19.034-23.886,19.54-24.583c4.868-6.703,3.379-16.083-3.324-20.951     c-6.704-4.867-16.083-3.381-20.952,3.324C177.381,119.801,89.518,200.956,8.234,242.612c-0.025,0.013-0.049,0.025-0.073,0.038     c-3.444,1.765-6.01,4.752-7.277,8.277c-1.178,3.275-1.179,6.867,0,10.147c1.267,3.524,3.833,6.512,7.277,8.277     c0.025,0.013,0.049,0.025,0.073,0.038c88.138,45.166,173.306,128.696,214.626,185.424c4.844,6.67,14.217,8.214,20.952,3.324     c6.703-4.868,8.191-14.248,3.324-20.951c-0.507-0.697-7.292-9.99-19.54-24.583C251.984,368.814,260.28,306.299,260.28,256     C260.28,205.667,251.973,143.167,227.595,99.398z M206.347,388.375C160.741,338.492,105.24,290.488,46.193,256     c58.936-34.422,114.404-82.337,160.154-132.374c7.51,16.124,13.45,35.958,17.534,58.205c-36.1,5.387-63.882,36.592-63.882,74.169     s27.781,68.782,63.883,74.17C219.796,352.418,213.857,372.251,206.347,388.375z M189.998,256     c0-22.458,16.537-41.124,38.073-44.466c1.45,14.259,2.21,29.166,2.21,44.466c0,15.3-0.76,30.208-2.21,44.466     C206.535,297.124,189.998,278.458,189.998,256z" data-original="#000000" class="active-path" fill=""/>
			<path d="M359.979,190.15l141.999-50c7.814-2.751,11.919-11.317,9.167-19.13c-2.75-7.813-11.319-11.916-19.13-9.167l-141.999,50     c-7.814,2.751-11.919,11.317-9.167,19.13C343.598,188.793,352.163,192.903,359.979,190.15z" data-original="#000000" class="active-path" fill=""/>
			<path d="M354.997,271h141.999c8.284,0,15-6.716,15-15c0-8.284-6.716-15-15-15H354.997c-8.284,0-15,6.716-15,15     C339.997,264.284,346.713,271,354.997,271z" data-original="#000000" class="active-path" fill=""/>
		</g>
	</g>
</g></g> </svg>

</a>
</li>


				</ul>
			</td>
			</tr>
			<!-- ****** -->
				@endforeach
			</tbody>
			</table>
			<div class="custom-paginate py-2">
			{{ $sellers->appends(['search' =>request()->get('search')])->links() }}
		  @if(!count($sellers)>0)
                <p class="text-xs">No Records</p>
            @endif
		    </div>
		</div>

	</div>
	<!-- content end -->
	

<!-- main section end -->
@endsection
@push('scripts')

<script>

function change()
{
	
	var $sort_by=document.getElementById('sort_by').value;
	var $paginate=document.getElementById('paginate').value;
	var $search=document.getElementById('search').value;
	
	window.location.href="{{url('/admin/seller?sort_by=')}}"+$sort_by+"&paginate="+$paginate+"&search="+$search;
}


</script> 
