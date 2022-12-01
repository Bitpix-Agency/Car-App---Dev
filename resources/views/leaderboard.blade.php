@extends('layout.app')
@section('title', 'Leaderboard')
@section('content')
<header class="vehicle-header-cls" style="">
	@include('include.navigation')
</header>
@livewire('leaders-component')
@endsection
