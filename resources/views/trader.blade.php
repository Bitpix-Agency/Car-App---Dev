@extends('layout.app')
@section('title', 'Single Traders')
@section('content')
<header class="vehicle-header-cls" style="">
	@include('include.navigation')
</header>

@livewire('trader-component', ['id' => Route::current()->parameter('id')])

@endsection
