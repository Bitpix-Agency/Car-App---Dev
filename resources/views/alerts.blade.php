@extends('layout.app')
@section('title', 'All Alerts')
@section('content')
<header class="vehicle-header-cls" style="">
	@include('include.navigation')
</header>
@livewire('alerts-component')
@endsection
