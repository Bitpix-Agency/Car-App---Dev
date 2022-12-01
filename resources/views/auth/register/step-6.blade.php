@extends('layout.auth')
@section('title', 'Trader Application - Step 6')
@section('content')
<h3 class="mb-0">Trader Application</h3>
<span class="create-acc">Create Payment Method</span>
<div class="icon-button-div form-dv">
	<div class="row align-items-center">
		<div class="col-sm-12 col-lg-12 form-reg-mthd">
			<form action="register-upload-profile-pic.html" method="POST" >
				<div class="row">
					<div class="col-sm-6 col-lg-6">
						<div class="form-group">
							<label for="cc-number">16 Digit Card Number</label>
							<input type="text" class="form-control" id="cc-number"  required>
						</div>
					</div>
					<div class=" col-sm-3 col-lg-3">
						<div class="form-group">
							<label for="cc-expiration">Expiry</label>
							<input type="text" class="form-control" id="cc-expiration"  name="pass2" required>
						</div>
					</div>
					<div class=" col-sm-3 col-lg-3">
						<div class="form-group">
							<label for="cc-cvv">CVV</label>
							<input type="text" class="form-control" id="cc-cvv"  name="pass2" required>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary mt-3 next-btn">Pay <i class='fa fa-angle-right'></i></button>
			</form>
			<div class="free-trail-cls payment-div">
				You will be billed after your 30 day free trial ends
			</div>
		</div>
	</div>
</div>
@endsection
