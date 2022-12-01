@extends('layout.app')
@section('title', 'Update Password')
@section('content')
    <header class="vehicle-header-cls" style="">
        @include('include.navigation')
    </header>
    @livewire('password-reset-component')
@endsection
