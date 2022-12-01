@extends('layout.app')
@section('title', 'All Traders')
@section('content')
<header class="vehicle-header-cls" style="">
	@include('include.navigation')
</header>
@livewire('traders-component')
@endsection
