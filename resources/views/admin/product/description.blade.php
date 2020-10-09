@extends('admin.product.details')
@section('tab')
<div id="tabcontent1" class="box active">
                <p class="text-sm leading-loose text-gray-700 ">
					{{$product->description}}
				</p>
 </div>
 @endsection