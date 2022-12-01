@extends('layout.app')
@section('title', 'Listings')
@section('content')
<header class="vehicle-header-cls" style="">
	@include('include.navigation')
</header>
@livewire('trader-listings-component')

@endsection
