@extends('layout.auth')
@section('title', 'Trader Application - Step 3')
@section('content')
<h3 class="mb-0">Trader Application</h3>
<span class="create-acc">Set Your Profile Picture</span>
<div class="icon-button-div form-dv">
	<div class="row align-items-center">
		<div class="col-sm-12 col-lg-12 form-reg-mthd">
			<label for="image-profile">Click to Upload</label>
			<form action="#" method="POST" class="dropzone" id="upload-widget">
				<div class="fallback">
					<input name="file" type="file"  />
					<input type="submit" value="Upload" />
				</div>
				<div class="dz-message" data-dz-message><span>
                    <img src="{{ asset('images/upload.png') }}"></span>
                </div>
			</form>
			<div class="row">
				<div class="col-sm-6 col-lg-6">
					<div class="form-group">
						<button type="submit" class="btn btn-primary mt-3 next-btn upld-prof">Next <i class='fa fa-angle-right'></i></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
