@extends('layouts.admin.layout')
@section('content')
	

		<div class="flex items-center justify-between pt-2 pb-4 border-b" style="border-color: 1px solid #f3f3f3;">
		<h2 class="text-base text-gray-700 font-semibold">{{trans('transaction.transactionhead')}}</h2>
		<!-- <a href="#" class="bg_orange text-white text-sm px-4 py-1 rounded-full">Create Product</a> -->
		</div>
	    	 @include('admin.transaction.search')
		<div class="seller_table bg-white">
		<div class="my-5">
			<table class="w-full">
				<thead>
					<tr>
 
					    <th width="5%">{{trans('transaction.id')}}</th>
						<th>{{trans('transaction.user')}}</th>
						<th>{{trans('transaction.amount')}} </th>
						<th>{{trans('transaction.comments')}}</th>
						<th>{{trans('transaction.refid')}}</th>
						<th>{{trans('transaction.refname')}}</th>
					</tr>
				</thead>
			
			<tbody>
			@foreach($transactions as $transaction)
		
 
				<tr class="seller_list rounded  bg-white">
 
			<td class="px-3 py-3">{{$transaction->id}}</td>
			
			<td class="px-3 py-3">
			  <a href="{{url('/admin/buyer/'.$transaction->user->id.'/details')}}"> 
			   <p class="text-xs text-orange font-semibold">{{$transaction->user->name}}</p>
			</a>
			</td>
			<td class="px-3 py-3">
			    <p class="flex items-center">
			    <img src="images/icons_1/up-arrow.svg" class="w-3 h-3">
			    <span class="mx-2 text-sm whitespace-no-wrap">{{$transaction->amount}}</span></p>
			</td>
			<td class="px-3 py-3">
			    <p class="text-sm">{{$transaction->comment}}</p>
			</td>
			<td class="px-3 py-3">
			    <p class="text-sm">refid</p>
			</td>
			<td class="px-3 py-3">
			    <p class="text-sm">Withdraw</p>
			</td>
			</tr>@endforeach
			</tbody>
			</table>
		</div>
		<div class="custom-paginate py-2">
		{{$transactions->appends(['search' =>request()->get('search')])->links()}}
		  @if(!count($transactions)>0)
                <p class="text-xs">No Records</p>
           @endif
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
    window.location.href="{{url('/admin/transaction?sort_by=')}}"+$sort_by+"&paginate="+$paginate+"&search="+$search;
}


</script> 
@endpush
