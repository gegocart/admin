

		<div class="flex items-center justify-between pt-2 pb-4 border-b" style="border-color: 1px solid #f3f3f3;">
		<h2 class="text-base text-gray-700 font-semibold">{{trans('sellerlist.seller')}}</h2>
		<a href="{{url('/admin/seller/add')}}"  class="bg_orange text-white text-sm px-4 py-1 rounded-full">{{trans('sellerlist.createseller')}}</a>
		</div>
		<div class="my-3">
			@include('admin.seller.search')
</div>

