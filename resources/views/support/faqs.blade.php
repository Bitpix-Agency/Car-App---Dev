@extends('layout.app')
@section('title', 'FAQs')
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
						<li class="breadcrumb-item active" aria-current="page">FAQs</li>
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
            <div class="col-md-9">
                <div id="accordion">
                    <div class="panel panel-default mb-3">
                        <div class="panel-heading" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h3 class=" h5 accordion-toggle text-black mb-0">
                                        1) How to change your location? <i class="fas fa-chevron-right"></i>
                                    </h3>
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse in" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <iframe src="https://player.vimeo.com/video/533499536?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="How to change your location | Web Application | Trade 2 Trade"></iframe>
                            </div>
                        </div>
                    </div>
                    <!-- How to post a vehicle? -->
                    <div class="panel panel-default mb-3">
                        <div class="panel-heading" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    <h3 class=" h5 accordion-toggle text-black mb-0">
                                        2) How to post a vehicle? <i class="fas fa-chevron-right"></i>
                                    </h3>
                                </button>
                            </h5>
                        </div>

                        <div id="collapseTwo" class="collapse in" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <iframe src="https://player.vimeo.com/video/533572262?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="How to post a vehicle | Web Application | Trade 2 Trade"></iframe>
                            </div>
                        </div>
                    </div>
                    <!-- How to view a Motor Check report? -->
                    <div class="panel panel-default mb-3">
                        <div class="panel-heading" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    <h3 class=" h5 accordion-toggle text-black mb-0">
                                        3) How to view a Motor Check report? <i class="fas fa-chevron-right"></i>
                                    </h3>
                                </button>
                            </h5>
                        </div>

                        <div id="collapseThree" class="collapse in" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                <iframe src="https://player.vimeo.com/video/533583276?title=0&amp;byline=0&amp;portrait=0&amp;speed=0&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" width="640" height="360 " frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="How to view a Motor Check report | Web App | Trade 2 Trade"></iframe>
                            </div>
                        </div>
                    </div>

                    <!-- How to update your billing details? -->
                    <div class="panel panel-default mb-3">
                        <div class="panel-heading" id="headingFour">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    <h3 class=" h5 accordion-toggle text-black mb-0">
                                        3) How to update your billing details? <i class="fas fa-chevron-right"></i>
                                    </h3>
                                </button>
                            </h5>
                        </div>

                        <div id="collapseFour" class="collapse in" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body">
                                <iframe src="https://player.vimeo.com/video/534081480?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" width="640" height="360 frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="How to update your billing details | Web App | Trade 2 Trade"></iframe>
                            </div>
                        </div>
                    </div>

                    <!-- How to update your email address? -->
                    <div class="panel panel-default mb-3">
                        <div class="panel-heading" id="headingFive">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                    <h3 class=" h5 accordion-toggle text-black mb-0">
                                        3) How to update your email address? <i class="fas fa-chevron-right"></i>
                                    </h3>
                                </button>
                            </h5>
                        </div>

                        <div id="collapseFive" class="collapse in" aria-labelledby="headingFive" data-parent="#accordion">
                            <div class="card-body">
                                <iframe src="https://player.vimeo.com/video/533730526?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" width="640" height="360 frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="How to update your email address | Web App | Trade 2 Trade"></iframe>
                            </div>
                        </div>
                    </div>

                    <!-- How to Upvote a User? -->
                    <div class="panel panel-default mb-3">
                        <div class="panel-heading" id="headingSix">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                    <h3 class=" h5 accordion-toggle text-black mb-0">
                                        3) How to Upvote a User? <i class="fas fa-chevron-right"></i>
                                    </h3>
                                </button>
                            </h5>
                        </div>

                        <div id="collapseSix" class="collapse in" aria-labelledby="headingSix" data-parent="#accordion">
                            <div class="card-body">
                                <iframe src="https://player.vimeo.com/video/533732042?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="How to Upvote a User | Web App | Trade 2 Trade"></iframe>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
