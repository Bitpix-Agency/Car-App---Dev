@extends('layout.app')
@section('title', 'All Posts')
@section('content')
<header class="vehicle-header-cls" style="">
	@include('include.navigation')
</header>
<!--Remaining section-->
@livewire('post-component',['id' => Route::current()->parameter('id')])

@endsection
