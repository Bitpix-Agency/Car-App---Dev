@extends('layout.auth')
@section('title', 'Forgotten Your Password?')
@section('content')
<h3 class="mb-0">Welcome to Trade to Trade</h3>
<span class="create-acc">Set Your New Password</span>
<div class="icon-button-div form-dv">
	<div class="row align-items-center">
		<div class="col-sm-12 col-lg-12">
			<form>
				<div class="form-group">
					<label for="exampleInputPassword1">Enter Your New Password</label>
					<input type="password" class="form-control" id="newPassword1" placeholder="" required>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Confirm Your New Password</label>
					<input type="password" class="form-control" id="newPassword2" placeholder="" required>
				</div>
				<button type="submit" class="btn btn-primary">Update</button>
			</form>
		</div>
	</div>
</div>
@endsection
