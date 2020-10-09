@extends('layouts.admin.layout')
@section('content')
@include('admin.store.success')
		<div class="flex items-center justify-between pt-2 pb-4 border-b" style="border-color: 1px solid #f3f3f3;">
		<h2 class="text-base text-gray-700 font-semibold">{{trans('store.stores')}}</h2>
<!-- 		<a href="#" class="bg_orange text-white text-sm px-4 py-1 rounded-full">{{trans('store.createstore')}}</a> -->
		</div>
            @include('admin.store.search')

		<div class="seller_table bg-white">
		<div class="">
			<table class="w-full">
				<thead>
					<tr>
				 
					<th width="5%">{{trans('store.id')}}</th>
					<th>{{trans('store.name')}}</th>
					<th>{{trans('store.user')}}</th>
					<th width="5%">{{trans('store.status')}}</th>
					<th>{{trans('store.actions')}}</th>
					</tr>
				</thead>
			
			<tbody>

		@foreach($stores as $store)
			<tr class="seller_list rounded  bg-white">
			<td class="px-3 py-3">{{$store->id}}</td>
            <td class="px-3 py-3">
				<a href="{{url('admin/store/profile/'.$store->slug)}}"><p class="text-sm text-orange font-semibold">{{$store->name}}</p></a>
			</td>
			<td class="px-3 py-3">
                 <a href="{{url('/admin/seller/'.$store->users->id.'/details')}}"> 
					<p class="text-sm text-orange font-semibold">{{$store->users->name}}</p>
                 </a>
			</td>
			<td class="px-3 py-3 text-center">
				 @if($store->status=="1")
	  				<span class="active_status"></span>
                 @else
                    <span class="cancel_status"></span>
                 @endif
			</td>

</g></g> </svg>			<td class="px-3 py-3">
				<!-- <ul class="list-reset flex items-center action_icon"> 
					<li>
					<a href="#">
					<svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve" width="512px" height="512px"><g><g>
	<g>
		<g>
			<path d="M501.978,371.851l-141.999-50c-7.811-2.753-16.379,1.352-19.13,9.167c-2.752,7.814,1.353,16.379,9.167,19.13l141.999,50     c7.837,2.759,16.388-1.378,19.13-9.167C513.897,383.167,509.792,374.602,501.978,371.851z" data-original="#000000" class="active-path" fill=""/>
			<path d="M227.595,99.398c12.248-14.593,19.034-23.886,19.54-24.583c4.868-6.703,3.379-16.083-3.324-20.951     c-6.704-4.867-16.083-3.381-20.952,3.324C177.381,119.801,89.518,200.956,8.234,242.612c-0.025,0.013-0.049,0.025-0.073,0.038     c-3.444,1.765-6.01,4.752-7.277,8.277c-1.178,3.275-1.179,6.867,0,10.147c1.267,3.524,3.833,6.512,7.277,8.277     c0.025,0.013,0.049,0.025,0.073,0.038c88.138,45.166,173.306,128.696,214.626,185.424c4.844,6.67,14.217,8.214,20.952,3.324     c6.703-4.868,8.191-14.248,3.324-20.951c-0.507-0.697-7.292-9.99-19.54-24.583C251.984,368.814,260.28,306.299,260.28,256     C260.28,205.667,251.973,143.167,227.595,99.398z M206.347,388.375C160.741,338.492,105.24,290.488,46.193,256     c58.936-34.422,114.404-82.337,160.154-132.374c7.51,16.124,13.45,35.958,17.534,58.205c-36.1,5.387-63.882,36.592-63.882,74.169     s27.781,68.782,63.883,74.17C219.796,352.418,213.857,372.251,206.347,388.375z M189.998,256     c0-22.458,16.537-41.124,38.073-44.466c1.45,14.259,2.21,29.166,2.21,44.466c0,15.3-0.76,30.208-2.21,44.466     C206.535,297.124,189.998,278.458,189.998,256z" data-original="#000000" class="active-path" fill=""/>
			<path d="M359.979,190.15l141.999-50c7.814-2.751,11.919-11.317,9.167-19.13c-2.75-7.813-11.319-11.916-19.13-9.167l-141.999,50     c-7.814,2.751-11.919,11.317-9.167,19.13C343.598,188.793,352.163,192.903,359.979,190.15z" data-original="#000000" class="active-path" fill=""/>
			<path d="M354.997,271h141.999c8.284,0,15-6.716,15-15c0-8.284-6.716-15-15-15H354.997c-8.284,0-15,6.716-15,15     C339.997,264.284,346.713,271,354.997,271z" data-original="#000000" class="active-path" fill=""/>
		</g>
	</g>

</a>
</li>
<li>
	<a href="#">
	<svg class="fill-current w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 383.947 383.947" style="enable-background:new 0 0 383.947 383.947;" xml:space="preserve" width="512px" height="512px"><g><g>
	<g>
		<g>
			<polygon points="0,303.947 0,383.947 80,383.947 316.053,147.893 236.053,67.893    " data-original="#000000" class="active-path" fill=""/>
			<path d="M377.707,56.053L327.893,6.24c-8.32-8.32-21.867-8.32-30.187,0l-39.04,39.04l80,80l39.04-39.04     C386.027,77.92,386.027,64.373,377.707,56.053z" data-original="#000000" class="active-path" fill=""/>
		</g>
	</g>
</g></g> </svg></a>
</li> -->
<!-- <li> -->
	<a href="#"class="del"  rel="{{url('/admin/store/'.$store->id.'/delete')}}">
		<svg class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" height="512px" viewBox="-47 0 512 512" width="512px"><g><path d="m416.875 114.441406-11.304688-33.886718c-4.304687-12.90625-16.339843-21.578126-29.941406-21.578126h-95.011718v-30.933593c0-15.460938-12.570313-28.042969-28.027344-28.042969h-87.007813c-15.453125 0-28.027343 12.582031-28.027343 28.042969v30.933593h-95.007813c-13.605469 0-25.640625 8.671876-29.945313 21.578126l-11.304687 33.886718c-2.574219 7.714844-1.2695312 16.257813 3.484375 22.855469 4.753906 6.597656 12.445312 10.539063 20.578125 10.539063h11.816406l26.007813 321.605468c1.933594 23.863282 22.183594 42.558594 46.109375 42.558594h204.863281c23.921875 0 44.175781-18.695312 46.105469-42.5625l26.007812-321.601562h6.542969c8.132812 0 15.824219-3.941407 20.578125-10.535157 4.753906-6.597656 6.058594-15.144531 3.484375-22.859375zm-249.320312-84.441406h83.0625v28.976562h-83.0625zm162.804687 437.019531c-.679687 8.402344-7.796875 14.980469-16.203125 14.980469h-204.863281c-8.40625 0-15.523438-6.578125-16.203125-14.980469l-25.816406-319.183593h288.898437zm-298.566406-349.183593 9.269531-27.789063c.210938-.640625.808594-1.070313 1.484375-1.070313h333.082031c.675782 0 1.269532.429688 1.484375 1.070313l9.269531 27.789063zm0 0" data-original="#000000" class="active-path" fill=""/><path d="m282.515625 465.957031c.265625.015625.527344.019531.792969.019531 7.925781 0 14.550781-6.210937 14.964844-14.21875l14.085937-270.398437c.429687-8.273437-5.929687-15.332031-14.199219-15.761719-8.292968-.441406-15.328125 5.925782-15.761718 14.199219l-14.082032 270.398437c-.429687 8.273438 5.925782 15.332032 14.199219 15.761719zm0 0" data-original="#000000" class="active-path" fill=""/><path d="m120.566406 451.792969c.4375 7.996093 7.054688 14.183593 14.964844 14.183593.273438 0 .554688-.007812.832031-.023437 8.269531-.449219 14.609375-7.519531 14.160157-15.792969l-14.753907-270.398437c-.449219-8.273438-7.519531-14.613281-15.792969-14.160157-8.269531.449219-14.609374 7.519532-14.160156 15.792969zm0 0" data-original="#000000" class="active-path" fill=""/><path d="m209.253906 465.976562c8.285156 0 15-6.714843 15-15v-270.398437c0-8.285156-6.714844-15-15-15s-15 6.714844-15 15v270.398437c0 8.285157 6.714844 15 15 15zm0 0" data-original="#000000" class="active-path" fill=""/></g> </svg>

	</a>
<!-- </li> -->

				<!-- </ul> -->
			</td>
			</tr>
			<!-- ****** -->
			<!-- ****** -->
		
			<!-- ****** -->
			@endforeach
			</tbody>
			</table>
		<div class="custom-paginate py-2">
			{{ $stores->appends(['search' =>request()->get('search')])->links() }}
		  @if(!count($stores)>0)
                <p class="text-xs">No Records</p>
           @endif
		</div>
		</div>
		 
		<!-- <div class="custom-paginate mx-2 pb-3">
			<ul class="flex list-reset items-center">
				<li class="disable"><a href="#">&#10094</a></li>
				<li class="active"><a href="#" >1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">&#10095</a></li>
			</ul>
		</div> -->
</div>

@endsection

@push('scripts')
 
<script>

function change()
{
	var $sort_by=document.getElementById('sort_by').value;
	var $paginate=document.getElementById('paginate').value;
	var $search=document.getElementById('search').value;
    window.location.href="{{url('/admin/store?sort_by=')}}"+$sort_by+"&paginate="+$paginate+"&search="+$search;
}


</script> 
 @include('admin.store.warning')

@endpush
