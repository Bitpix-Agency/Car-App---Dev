@extends('layout.app')
@section('title', 'Complete Listing')
@section('content')
    <header class="vehicle-header-cls" style="">
        @include('include.navigation')
    </header>

    @livewire('edit-listing-component',['id' => Route::current()->parameter('id')])

@endsection
