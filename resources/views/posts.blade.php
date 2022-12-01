@extends('layout.app')
@section('title', 'All Posts')
@section('content')
    <header class="vehicle-header-cls" style="">
        @include('include.navigation')
    </header>

    @livewire('posts-main-component')

@endsection
