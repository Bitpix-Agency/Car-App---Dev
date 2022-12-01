@extends('layout.app')
@section('title', 'Complete Listing')
@section('content')
    <header class="vehicle-header-cls" style="">
        @include('include.navigation')
    </header>

    @livewire('listing-component')

@endsection
