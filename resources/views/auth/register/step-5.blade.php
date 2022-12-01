@extends('layout.auth')
@section('title', 'Trader Application - Step 5')
@section('content')
<h3 class="mb-0">Trader Application</h3>
<span class="create-acc">Subscription</span>
<div class="icon-button-div form-dv">
	<div class="row align-items-center">
		<div class="col-sm-12 col-lg-12 form-reg-mthd">
			<form action="register-payment.html" method="POST" >
				<div class="row subscription-main-row">
					<input type="checkbox" name="rGroup" value="1" id="r1" />
					<label class="whatever" for="r1">
						<div class="col-sm-12">
							<div class="subscription-box">
								<div class="table-inner">
									<table>
										<tbody>
											<tr class="sub-tr">
												<td class="left-td">
													<img src="{{ asset('images/trade-subscription') }}.png">
												</td>
												<td class="rgt-td">
													<span class="sub-price"> £ERROR</span><br>
													<span class="sub-price-bottom-txt"> Auto renewing plan</span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="monthly-plan-text">Content.error </div>
							</div>
							<div class="free-trail-cls">
								You will be billed after your 30 day free trial ends
							</div>
						</div>
					</label>
				</div>
				<button type="submit" class="btn btn-primary mt-3 next-btn ">Next <i class='fa fa-angle-right'></i></button>
			</form>
		</div>
	</div>
</div>
@endsection
