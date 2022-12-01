@extends('layout.auth')
@section('title', 'Login in Via Email')
@section('content')
<h3 class="mb-0">Welcome to Trade to Trade</h3>
<span class="create-acc">Login</span>
<div class="icon-button-div form-dv">
	<div class="row align-items-center">
		@livewire('login-register')
	</div>
</div>
@endsection
