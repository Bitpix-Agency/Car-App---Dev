@extends('layout.app')
@section('title', 'Sold Car')
@section('content')
    <header class="vehicle-header-cls" style="">
        @include('include.navigation')
    </header>
    @livewire('sold-component',['id' => Route::current()->parameter('id')])
@endsection
