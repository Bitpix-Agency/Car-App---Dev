@extends('layout.app')
@section('title', 'Invoices')
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
                        <li class="breadcrumb-item active" aria-current="page">Invoices</li>
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
				<h2 class="all-cars-cls">Account: Invoices</h2>
			</div>
            <div class="col-sm-12 col-lg-8">
                <div class="row">
                    <div class="col-md-3 col-12">
                        <a href="/app/account/feedback" class="btn btn-account btn-block mb-3 mb-sm-0">Feedback</a>
                    </div>
                    <div class="col-md-3 col-12">
                        <a href="/app/account/listings" class="btn btn-account btn-block mb-3 mb-sm-0">My Listings</a>
                    </div>
                    <div class="col-md-3 col-12">
                        <a href="/app/account" class="btn btn-account btn-block mb-3 mb-sm-0 active">Account</a>
                    </div>
                    <div class="col-md-3 col-12">
                        <a href="/logout" class="btn btn-account btn-block mb-3 mb-sm-0">Sign Out</a>
                    </div>
                </div>
            </div>
		</div>
	</div>
</section>
<section class="results-sec mt-5" id="account">
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
                    <li class="list-inline-item">
                        <a href="/app/account/billing" class="account-link text-black">Billing</a>
                    </li>
                    <li class="list-inline-item active">
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

		<div class="row mt-5 mb-5" id="account">
			<div class="col-md-12">
				<div class="bg-light-grey p-5 border-radius-20">
                    <h5>Your Subscription Invoices</h5>
                    <table class="table table-striped mb-0">
                        <thead>
                          <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                          </tr>
                        </thead>
                        <tbody class="border-0">
                          <tr class="py-5">
                            <td>01/11/20</td>
                            <td>Stripe Ref</td>
                            <td>£34.99</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
			</div>
		</div>

	</div>
</section>
@endsection
