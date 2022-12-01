@extends('layout.app')
@section('title', 'Inbox')
@section('content')
<header class="vehicle-header-cls" style="">
	@include('include.navigation')
</header>
@livewire('inbox-component')
@endsection
