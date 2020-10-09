@extends('admin.buyer.details')
@section('tab')
	


  <div id="tabcontent6" class="box ">
		  		  <!-- filter -->
		                @include('admin.buyer.search')
                  <!-- filter -->
		  		  	<div class="seller_table bg-white overflow-y-auto">
			<table class="w-full">
				<thead>
					<tr>
					    <th width="5%">{{trans('details.id')}}</th>
					    <th>{{trans('details.orderno')}}</th>
					    <th>{{trans('details.email')}}</th>
						<th>{{trans('details.amount')}}</th>
						<th>{{trans('details.expire_date')}}</th>
						<th>{{trans('details.used_status')}}</th>
						
					</tr>
				</thead>
			
			<tbody>
				 <?php $i=1;?>
     @foreach($orders as $order)
    
			<tr  class=" rounded  bg-white">
			<td class="px-3 py-3">{{$i++}}</td>
			<td class="px-3 py-3">{{$order->order->orderno}}</td>
			<td class="px-3 py-3">{{$order->orderitem->to_email}}</td>
			<td class="px-3 py-3">{{$order->amount}}</td>
			<td class="px-3 py-3">{{date('d-m-Y', strtotime($order->expire_on))}}</td>
			<td class="px-3 py-3">
				            @if($order->is_used==1)
		  		    		   <span class="active_status"></span>
		  		    		@else
		  		    			<span class="cancel_status"></span>
		  		    		@endif
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
	
	window.location.href="{{url('/admin/buyer/'.$user->id.'/giftorders?sort_by=')}}"+$sort_by+"&paginate="+$paginate+"&search="+$search;
}

</script> 
@include('admin.buyer.warning')
@endpush
