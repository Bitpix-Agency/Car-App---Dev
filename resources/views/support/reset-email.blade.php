@extends('layout.app')
@section('title', 'Request Email Change')
@section('content')
    <header class="vehicle-header-cls" style="">
        @include('include.navigation')
    </header>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/support">Support</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Request Email Change</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="form-sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-6">
                <h2 class="all-cars-cls">@yield('title')</h2>
            </div>
        </div>
    </div>
</section>
<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="help-content">
                    <div class="bg-light-grey p-5 border-radius-20">
                        <div class="content-help bg-white p-5 border-radius-20 mb-5">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <i class="fas fa-exclamation-triangle fa-3x pt-2"></i>
                                </div>
                                <div class="col-md-10">
                                    <h5>Can you no longer access your email address?</h5>
                                    <p class="form-text text-muted mb-0">If you no longer have access to your current email address and would like to request a new password, please fill out the form below to request a change of email address. Once your request has been validated by our support team, you will be able to use our <a href="/forgotPassword">Forgotten Password</a> tool to generate a new password.</p>
                                </div>
                            </div>
                        </div>
                        <form method="POST" action="https://hooks.zapier.com/hooks/catch/9785744/o7eqikf">
                            <div class="form-group mw-100">
                                <label for="fullName">Your full name</label>
                                <input type="text" name="fullName" class="form-control bg-white" id="fullName" aria-describedby="nameHelp" placeholder="Enter your full name" required/>
                                <small id="nameHelp" class="form-text text-muted">Please enter your full name on your account</small>
                            </div>
                            <div class="form-group mw-100 mt-5">
                                <label for="currentEmail">Your Current Email Address</label>
                                <input type="email" name="oldEmail" class="form-control bg-white" id="currentEmail" aria-describedby="currentEmailHelp" placeholder="Enter your current email address" required/>
                                <small id="currentEmailHelp" class="form-text text-muted">Please enter the current email address associated with your account</small>
                            </div>
                            <div class="form-group mw-100 mt-5">
                                <label for="phoneNumber">Your Phone Number</label>
                                <input type="text" name="phoneNumber" class="form-control bg-white" id="phoneNumber" aria-describedby="phone" placeholder="Enter your current phone number" required/>
                                <small id="phone" class="form-text text-muted">Please enter your phone number</small>
                            </div>
                            <div class="form-group mw-100 mt-5">
                                <label for="exampleInputEmail1">Last 4 Digits on your Card</label>
                                <input type="text" name="last4Digits" class="form-control bg-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the last 4 digits" required/>
                                <small id="emailHelp" class="form-text text-muted">Enter the last 4 digits on your billing debit or credit card</small>
                            </div>
                            <div class="form-group mw-100 mt-5">
                                <label for="exampleInputEmail1">Your New Email Address</label>
                                <input type="text" name="newEmail" class="form-control bg-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your new email address" required/>
                                <small id="emailHelp" class="form-text text-muted">Please enter your NEW email address</small>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-5">Request Change</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
