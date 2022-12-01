@extends('layout.app')
@section('title', 'Account')
@section('content')
<header class="vehicle-header-cls" style="">
	@include('include.navigation')
</header>
@livewire('account-details-component')
@endsection
