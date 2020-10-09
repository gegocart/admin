@extends('admin.buyer.details')
@section('tab')
	


  <div id="tabcontent1" class="box ">
		  		  <!-- filter -->
		                @include('admin.buyer.search')
                  <!-- filter -->
		  		  	<div class="seller_table bg-white overflow-y-auto">
			<table class="w-full">
				<thead>
					<tr>
					   
					    <th width="5%">{{trans('details.id')}}</th>
						<th>{{trans('details.shippingmethod')}}</th>
						<th>{{trans('details.paymentmethod')}}</th>
						<th>{{trans('details.address')}}</th>
						<th>{{trans('details.status')}}</th>
						<th>Actions</th>
					</tr>
				</thead>
			
			<tbody>
     @foreach($orders as $order)
			<tr  class=" rounded  bg-white">
			<td class="px-3 py-3"><!-- <input type="checkbox"> -->{{$order->id}}</td>
			 
			<td class="px-3 py-3">
				<p class="text-sm">{{$order->shippingMethod->name}}</p>
			</td>
			
			<td class="px-3 py-3">
				<p class="text-sm">{{$order->paymentMethod->gateway_name}}</p>
			</td>
			<td class="px-3 py-3"> 

				<p class="text-sm whitespace-no-wrap">{{$order->address->address_1}}</p>
			</td>
			<td class="px-3 py-3 text-center">
            <!--  @if($order->status=="completed")
				<span class="active_status"></span>
			 @else
			 	<span class="pending_status"></span> 
			 @endif -->
			 {{$order->status}}
			</td>
			<td class="px-3 py-3">
				<ul class="list-reset flex items-center action_icon"> 
					
<li>
	  <order-status-update id="{{$order->id}}" status="{{$order->status}}" ></order-status-update>
</li>

         </ul>
			</td>
			</tr>
			@endforeach
			<!-- ****** -->
			</tbody>
			</table>
			 <div class="custom-paginate py-2">
			{{ $orders->appends(['search' =>request()->get('search')])->links() }}
			@if(!count($orders)>0)
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
	
	window.location.href="{{url('/admin/buyer/'.$user->id.'/orders?sort_by=')}}"+$sort_by+"&paginate="+$paginate+"&search="+$search;
}

</script> 
@include('admin.buyer.warning')
@endpush
