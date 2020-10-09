@extends('layouts.admin.layout')
@section('content')
@include('admin.setting.success')
	
		
		<div class="flex items-center justify-between pt-2 pb-4 border-b" style="border-color: 1px solid #f3f3f3;">
		<h2 class="text-base text-gray-700 font-semibold">{{trans('setting.settings')}}</h2>
     
		<!-- <div class="bg_orange text-lg font-bold text-white  px-2 rounded-full">+</div> -->

		</div>
       
            
            @include('admin.setting.search')

		<div class="product_table seller_table bg-white">
		<div>
			<table class="w-full">
				<thead>
					<tr>
						<th>{{trans('setting.key')}}</th>
						<th>{{trans('setting.name')}}</th>
						<th>{{trans('setting.description')}}</th>
						<th>{{trans('setting.value')}}</th>
						<th>{{trans('setting.field')}}</th>
						<th>{{trans('setting.status')}}</th>
						<th>{{trans('setting.action')}}</th>
					</tr>
				</thead>
			
			<tbody>
	@foreach($settings as $setting)
			<tr class="seller_list rounded  bg-white">
		<!-- 	<td class="px-3 py-3"><input type="checkbox"></td> -->
			<td class="px-3 py-3">{{$setting->key}}</td>
			<td class="px-3 py-3">{{$setting->name}}</td>
			<td class="px-3 py-3">{{$setting->description}}</td>
			<td class="px-3 py-3">{{$setting->value}}</td>
			<td class="">
             <!--    <table class="w-full"> -->
				<div>
	
				@foreach(json_decode($setting->field) as $key=>$field)
                 <div class="flex items-center border">
					<div class="w-1/2 p-1 border-r"><p class="text-xs font-semibold txt_dark ">{{ucfirst($key)}}</p></div>
                    <div class="w-1/2 p-1 "><p class="text-xs ">  
					{{$field}} 
					</p></div>
               </div>
				@endforeach
              </div>
			<!-- </table> -->
			</td>
			<td class="px-3 py-3">

				 @if($setting->status=="1")
	  				<span class="active_status"></span>
                 @else
                    <span class="cancel_status"></span>
                 @endif				
			</td>
		 
			<td class="px-3 py-3">
				<ul class="list-reset flex items-center action_icon"> 
 	<li>
					    <a href="{{url('/admin/setting/'.$setting->id.'/edit')}}">
    <svg class="fill-current w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 383.947 383.947" style="enable-background:new 0 0 383.947 383.947;" xml:space="preserve" width="512px" height="512px"><g><g>
    <g>
        <g>
            <polygon points="0,303.947 0,383.947 80,383.947 316.053,147.893 236.053,67.893    " data-original="#000000" class="active-path" fill=""/>
            <path d="M377.707,56.053L327.893,6.24c-8.32-8.32-21.867-8.32-30.187,0l-39.04,39.04l80,80l39.04-39.04     C386.027,77.92,386.027,64.373,377.707,56.053z" data-original="#000000" class="active-path" fill=""/>
        </g>
    </g>
</g></g> </svg></a>
</li>
<li>

	<a  class="del"  rel="{{url('/admin/setting/'.$setting->id.'/delete')}}">
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
			{{ $settings->appends(['search' =>request()->get('search')])->links() }}
 @if(!count($settings)>0)
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
    window.location.href="{{url('/admin/setting?sort_by=')}}"+$sort_by+"&paginate="+$paginate+"&search="+$search;
}


</script> 
 @include('admin.setting.warning')

@endpush
