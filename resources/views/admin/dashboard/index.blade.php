@extends('layouts.admin.layout')
@section('content')

<h2 class="text-4xl lg:text-base text-gray-700 font-semibold">Dashboard</h2>
 @include('admin.dashboard.layer_one')
    @include('admin.dashboard.layer_two')
    @include('admin.dashboard.layer_three')
@endsection
