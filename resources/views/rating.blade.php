@extends('layout.app')
@section('title', 'Rate Trader')
@section('content')
    <header class="vehicle-header-cls" style="">
        @include('include.navigation')
    </header>
    @livewire('rating-component', [
    'soldtoUserId' => Route::current()->parameter('soldtoUserId'),
    'postId' => Route::current()->parameter('postId'),
    ])
@endsection
