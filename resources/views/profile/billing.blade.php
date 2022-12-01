@extends('layout.app')
@section('title', 'Update Payment Details')
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
						<li class="breadcrumb-item"><a href="/app/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/app/account">Account</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Billing</li>
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
				<h2 class="all-cars-cls">Account: Billing</h2>
			</div>
            <div class="col-sm-12 col-lg-8">
				<ul class="list-inline float-left float-md-right">
                    <li class="list-inline-item">
                        <a href="/app/account/feedback" class="btn btn-account">Feedback</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="/app/account/listings" class="btn btn-account">My Listings</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="/app/account" class="btn btn-account active">Account</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="/logout" class="btn btn-account">Sign Out</a>
                    </li>
                </ul>
			</div>
		</div>
	</div>
</section>
<section class="results-sec mt-5 mb-5" id="account">
	<div class="container">

        <div class="row">
            <div class="col-md-12">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="/app/account" class="account-link text-black">Account Details</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="/app/account/password" class="account-link text-black">Change Password</a>
                    </li>
                    <li class="list-inline-item active">
                        <a href="/app/account/billing" class="account-link text-black">Billing</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="/app/account/invoices" class="account-link text-black">Invoices</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="/app/account/subscription" class="account-link text-black">Subscription</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="/app/account/users" class="account-link text-black">Users</a>
                    </li>
                </ul>
            </div>
        </div>

		<div class="row mt-5">
			<div class="col-md-12">
				<div class="bg-light-grey p-5 border-radius-20">
                    <h5>Update Your Payment Details</h5>
                    <form>
                        <div class="row mt-5">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Card Number</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Expiry Date</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label>CVV</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <button class="btn btn-primary">Update Payment</button>
                            </div>
                        </div>
                    </form>
                </div>
			</div>
		</div>

	</div>
</section>
@endsection
