@extends('layout.app')
@section('title', 'Feedback')
@section('content')
<header class="vehicle-header-cls" style="">
	@include('include.navigation')
</header>
@livewire('feedback-component')
@endsection
