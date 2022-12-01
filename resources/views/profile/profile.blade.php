@extends('layout.app')
@section('title', 'Profile')
@section('content')
<header class="vehicle-header-cls" style="">
	@include('include.navigation')
</header>

@livewire('account-profile-component')

@endsection
