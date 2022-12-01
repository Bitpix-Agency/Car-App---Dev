@extends('layout.auth')
@section('title', 'Login in Via Email')
@section('content')
    <h3 class="mb-0">Trader Application</h3>
    <div class="icon-button-div form-dv">
        <div class="row align-items-center">
            <div class="col-sm-12 col-lg-12">
                @livewire('register-facebook-component',[
         'fbName' => Route::current()->parameter('name'),
         'fbEmail' => Route::current()->parameter('email'),
         'fbId' => Route::current()->parameter('fbid'),
         ])
            </div>
        </div>
    </div>
@endsection
