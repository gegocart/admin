@extends('admin.seller.details')
@section('tab')
	


  <div id="tabcontent1" class="box active">
		  		  <!-- filter --> 
		            @include('admin.seller.search')
                  <!-- filter -->
		  		  	<div class="seller_table bg-white overflow-y-auto">
			<table class="w-full">
				<thead>
					<tr>
	 
					    <th width="5%">{{trans('sellerdetail.id')}}</th>
						<th>{{trans('sellerdetail.shippingmethod')}}</th>
						<th>{{trans('sellerdetail.paymentmethod')}}</th>
						<th>{{trans('sellerdetail.address')}}</th>
						<th>{{trans('sellerdetail.status')}}</th>
						<th>Actions</th>
					</tr>
				</thead>
			
			<tbody>
     @foreach($orderItems as $orderItem)
			<tr  class="seller_list rounded  bg-white">
			<td class="px-3 py-3"><!-- <input type="checkbox"> -->{{$orderItem->id}}</td>
		 
			<td class="px-3 py-3">
				<p class="text-sm">{{$orderItem->order->shippingMethod->name}}</p>
			</td>
			
			<td class="px-3 py-3">
				<p class="text-sm">{{$orderItem->order->paymentMethod->gateway_name}}</p>
			</td>
			<td class="px-3 py-3">
				<p class="text-sm whitespace-no-wrap">{{$orderItem->order->address->address_1}}</p>
			</td>
			<td class="px-3 py-3  ">
             <!-- @if($orderItem->order->status=="completed")
				<span class="active_status"></span>
			 @else
			 	<span class="pending_status"></span> 
			 @endif -->
			  {{$orderItem->status}}
			</td>
			<td class="px-3 py-3">
				<ul class="list-reset flex items-center action_icon"> 
					<li>
						<!-- <order-status-update id="{{$orderItem->order->id}}" status="{{$orderItem->order->status}}" > -->
							<order-item-status-update id="{{$orderItem->id}}" status="{{$orderItem->status}}">
							</order-item-status-update>
</li>

         </ul>
			</td>
			</tr>
			@endforeach
			<!-- ****** -->
			</tbody>
			</table>
			 		<div class="custom-paginate py-2">
			{{ $orderItems->appends(['search' =>request()->get('search')])->links() }}
			 @if(!count($orderItems)>0)
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
	window.location.href="{{url('/admin/seller/'.$user->id.'/orders?sort_by=')}}"+$sort_by+"&paginate="+$paginate+"&search="+$search;
}


</script> 
 @include('admin.seller.warning')
@endpush
 