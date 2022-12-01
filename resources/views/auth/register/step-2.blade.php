@extends('layout.auth')
@section('title', 'Trader Application - Step 2')
@section('content')
<h3 class="mb-0">Trader Application</h3>
<span class="create-acc">Create Your Password</span>
<div class="icon-button-div form-dv">
	<div class="row align-items-center">
		<div class="col-sm-12 col-lg-12 form-reg-mthd">
			<form action="" method="POST" oninput='pass2.setCustomValidity(pass1.value != pass2.value ? "Passwords do not match." : "")'>
				<div class="row">
					<div class="col-sm-6 col-lg-6">
						<div class="form-group">
							<label for="password1">Password</label>
							<input type="password" class="form-control" id="password1"  name="pass1" required>
						</div>
					</div>
					<div class=" col-sm-6 col-lg-6">
						<div class="form-group">
							<label for="password2">Confirm Password</label>
							<input type="password" class="form-control" id="password2"  name="pass2" required>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary mt-3 next-btn">Next <i class='fa fa-angle-right'></i></button>
			</form>
		</div>
	</div>
</div>
@endsection
