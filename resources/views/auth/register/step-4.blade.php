@extends('layout.auth')
@section('title', 'Trader Application - Step 4')
@section('content')
<h3 class="mb-0">Trader Application</h3>
<span class="create-acc">Terms & Conditions</span>
<div class="icon-button-div form-dv">
	<div class="row align-items-center">
		<div class="col-sm-12 col-lg-12 form-reg-mthd">
			<form action="register-subscription.html" method="POST">
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<div class="table-responsive table-div">
								<table class="table-cls">
									<tbody>
										<tr>
											<td>
												<div>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean massa urna, finibus a ultricies sed, dapibus quis tortor. Etiam posuere quis mauris in sagittis. Nulla viverra in sem sit amet eleifend. Sed at eleifend tellus. In consequat, leo a porta faucibus, arcu quam rhoncus diam, non mattis sapien nunc at diam. Sed sapien diam, porttitor nec nulla nec, euismod consequat ligula. Pellentesque vehicula purus tortor, eu pulvinar arcu malesuada in. Donec facilisis ante est, in interdum massa tempor eget. Morbi porta nisl at condimentum feugiat. Phasellus nunc enim, euismod non vulputate sit amet, egestas nec turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean massa urna, finibus a ultricies sed, dapibus quis tortor. Etiam posuere quis mauris in sagittis. Nulla viverra in sem sit amet eleifend. Sed at eleifend tellus. In consequat, leo a porta faucibus,  </p>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary mt-3 next-btn accept-btn">Accept <i class='fa fa-angle-right'></i></button>
			</form>
		</div>
	</div>
</div>
@endsection
