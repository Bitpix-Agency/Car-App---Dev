@extends('layout.auth')
@section('title', 'Trader Application - Step 7')
@section('content')
<h3 class="mb-0">Welcome Jake,</h3>
<span class="create-acc">Verification Documents</span>
<div class="icon-button-div form-dv">
	<div class="row align-items-center reg-verif">
		<div class="col-sm-12 col-lg-12 form-reg-mthd">
			<div class="right-lets-head">
				<p class="right-title"><strong>Right lets get you verified!</strong></p>
				<p>The sooner everyone knows you’re a bonafide trader,<br>
					the sooner you can use the fantastic palform to full effect!
				</p>
			</div>
		</div>
		<div class="col-sm-4 col-lg-4 form-reg-mthd">
			<label for="image-profile">Upload an ID</label>
			<form action="register-terms.html" method="POST" class="dropzone" id="upload-widget">
				<div class="fallback">
					<input name="file" type="file"  />
					<input type="submit" value="Upload" />
				</div>
				<div class="dz-message" data-dz-message><span><img src="{{ asset('images/upload.png') }}"></span></div>
			</form>
			<!-- <form id="my-awesome-dropzone" action="register-terms.html" method="get" class="dropzone" > -->
			<!-- </form> -->
		</div>
		<div class="col-sm-4 col-lg-4 form-reg-mthd">
			<label for="image-profile">Upload a Selfie</label>
			<form action="register-terms.html" method="POST" class="dropzone" id="upload-widget">
				<div class="fallback">
					<input name="file" type="file"  />
					<input type="submit" value="Upload" />
				</div>
				<div class="dz-message" data-dz-message><span><img src="{{ asset('images/upload.png') }}"></span></div>
			</form>
			<!-- <form id="my-awesome-dropzone" action="register-terms.html" method="get" class="dropzone" > -->
			<!-- </form> -->
		</div>
		<div class="col-sm-4 col-lg-4 form-reg-mthd">
			<label for="image-profile">Upload a Document</label>
			<form action="register-terms.html" method="POST" class="dropzone" id="upload-widget">
				<div class="fallback">
					<input name="file" type="file"  />
					<input type="submit" value="Upload" />
				</div>
				<div class="dz-message" data-dz-message><span><img src="{{ asset('images/upload.png') }}"></span></div>
			</form>
			<!-- <form id="my-awesome-dropzone" action="register-terms.html" method="get" class="dropzone" > -->
			<!-- </form> -->
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6 col-lg-6">
			<div class="form-group">
				<button type="submit" class="btn btn-primary mt-3 next-btn upld-prof uplod-verf">Upload <i class='fa fa-angle-right'></i></button></span>
			</div>
		</div>
	</div>
</div>
@endsection
