@extends('layout.app')
@section('title', 'Post Submitted')
@section('content')
    <header class="vehicle-header-cls" style="">
        @include('include.navigation')
    </header>
    <div>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/app/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="/app/account/">Account</a></li>
                                <li class="breadcrumb-item"><a href="/app/account/listings">My Listings</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create Listing</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="form-sec">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-4">
                        <h2 class="all-cars-cls">Listing: Edit</h2>
                    </div>
                    <div class="col-sm-12 col-lg-8">
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <a href="/app/account/feedback" class="btn btn-account btn-block mb-3 mb-sm-0">Feedback</a>
                            </div>
                            <div class="col-md-3 col-12">
                                <a href="/app/account/listings" class="btn btn-account active btn-block mb-3 mb-sm-0">My Listings</a>
                            </div>
                            <div class="col-md-3 col-12">
                                <a href="/app/account" class="btn btn-account btn-block mb-3 mb-sm-0">Account</a>
                            </div>
                            <div class="col-md-3 col-12">
                                <a href="/logout" class="btn btn-account btn-block mb-3 mb-sm-0">Sign Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="results-sec mt-5 mb-5" id="account">
            {{--        Step One--}}
            <div class="container" id="step-2">
                <h3>Post Successfully Submitted.</h3>
            </div>
        </section>
    </div>

@endsection
