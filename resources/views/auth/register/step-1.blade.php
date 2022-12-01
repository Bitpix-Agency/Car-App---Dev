@extends('layout.auth')
@section('title', 'Invitation')
@section('content')
    @livewire('register-invited-user-component',[
    'email' => Route::current()->parameter('email')
])

@endsection
