@extends('layout.app')
@section('title', 'Home')
@section('content')
    @include('include.navigation')
<header class="header-cls" style="background: url({{ asset('images/bg.jpg') }}); min-height: 300px;">
    <section>
        <div class="container-fluid">
            <div class="row align-middle banner-txt" style="height: 640px;" >
                <div class="col-md-12">
                    <h1 class="">The UK’s No. 1 award winning used vehicle trade platform</h1>
                </div>
                <div class="col-sm-12">
                    @livewire('dash-board-search-component')
                </div>
            </div>
        </div>
    </section>
</header>
<section class="sec-cls lat-post-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p class="latest-spn">The Latest </p>
                <h3 class="newest-post-cls"> Newest Posts</h3>
            </div>
        </div>
        <div class="row" id="posts">
            @livewire('posts-component')
        </div>
        <div class="view-all"><a href="/app/posts">View All</a></div>
    </div>
</section>
<section class="sec-cls sec3 popularmakes-sec d-none" id="popularMakes">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-6 pop-left">
                <h3 class="newest-post-cls">Popular Makes</h3>
            </div>
            <div class="col-sm-6 col-lg-6 pop-right">
                <div class="pop-right-inner">
                    <a class="nav-link active" id="audi-tab" data-toggle="tab" href="#audi" role="tab" aria-controls="audi" aria-selected="true"><button class="filter-button filter1 current" data-filter="audi" >Audi<span class="filter-small-txt">14 Listings</span></button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="carousel-include">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="audi" role="tabpanel" aria-labelledby="audi-tab">
                <div class="row car-slider-cls">
                    <div class="col-12">
                        <div id="carCarousel slide-audi" class="popmakes carousel carousel-multi2 slide">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <div class="media media-card">
                                        <div class="card">
                                            <img class="card-img-top" src="{{ asset('images/audi4.png') }}" alt="Card image cap">
                                            <div class="card-body bg-black">
                                                <h5 class="card-title small-title text-white">Audi A4 4-door saloon</h5>
                                                <span class="price-block text-white small-price">£23,000</span>
                                                <hr class="sep">
                                                <div class="row">
                                                    <div class="col-sm-12 small-card-auto">
                                                        <span class="btn year-bt">2021</span><span class="auto-cls">Automatic</span><span class="petrol-cls">Petrol</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="media media-card">
                                        <div class="card">
                                            <img class="card-img-top" src="{{ asset('images/audi8.png') }}" alt="Card image cap">
                                            <div class="card-body bg-black">
                                                <h5 class="card-title small-title text-white">Audi A8 4-door estate blue</h5>
                                                <span class="price-block text-white small-price">£70,000</span>
                                                <hr class="sep">
                                                <div class="row">
                                                    <div class="col-sm-12 small-card-auto">
                                                        <span class="btn year-bt">2021</span><span class="auto-cls">Automatic</span><span class="petrol-cls">Petrol</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="media media-card">
                                        <div class="card">
                                            <img class="card-img-top" src="{{ asset('images/audi-silver.png') }}" alt="Card image cap">
                                            <div class="card-body bg-black">
                                                <h5 class="card-title small-title text-white">Audi A8 4-door saloon silver</h5>
                                                <span class="price-block text-white small-price">£14,600</span>
                                                <hr class="sep">
                                                <div class="row">
                                                    <div class="col-sm-12 small-card-auto">
                                                        <span class="btn year-bt">2021</span><span class="auto-cls">Automatic</span><span class="petrol-cls">Petrol</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="media media-card">
                                        <div class="card">
                                            <img class="card-img-top" src="{{ asset('images/audi7.png') }}" alt="Card image cap">
                                            <div class="card-body bg-black">
                                                <h5 class="card-title small-title text-white">Audi A7 4-door saloon black</h5>
                                                <span class="price-block text-white small-price">£30,000</span>
                                                <hr class="sep">
                                                <div class="row">
                                                    <div class="col-sm-12 small-card-auto">
                                                        <span class="btn year-bt">2021</span><span class="auto-cls">Automatic</span><span class="petrol-cls">Petrol</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="next-prev"><a class="btn btn-primary mb-3 mr-1" href="#carCarousel\ slide-audi" role="button" data-slide="prev"><button class="w3-button w3-large"><img src="{{ asset('images/prev.png') }}"></button></a>
                            <a class="btn btn-primary mb-3 " href="#carCarousel\ slide-audi" role="button" data-slide="next"><button class="w3-button w3-large"><img src="{{ asset('images/next.png') }}"></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-6"></div>
            <div class="view-all col-sm-6 col-lg-6"><a href="#">View 14 Audi</a></div>
        </div>
    </div>
</section>
<section class="sec-cls our-team-sec d-none" id="meetTeam">
    <div class="container our-team-cont">
        <div class="row our-team-row">
            <div class="col-sm-5 resp-100">
                <h3 class="newest-post-cls our-team-title">Our team</h3>
                <ul class="our-team-cls">
                    <li>Praesent nibh luctus viverra</li>
                    <li>Praesent nibh luctus viverra</li>
                    <li>Praesent nibh luctus viverra</li>
                    <li>Praesent nibh luctus viverra</li>
                    <li>Praesent nibh luctus viverra</li>
                </ul>
                <div class="col-sm-6 col-lg-6">
                    <div class="next-prev"><a class="btn btn-primary mb-3 mr-1" href="#carousel-example-multi" role="button" data-slide="prev">
                        <button class="w3-button w3-large">
                            <img src="{{ asset('images/prev.png') }}">
                        </button></a>
                        <a class="btn btn-primary mb-3 " href="#carousel-example-multi" role="button" data-slide="next">
                            <button class="w3-button w3-large">
                                <img src="{{ asset('images/next.png') }}">
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 resp-100">
                <div class="row team-card-row">
                    <div class="col-12">
                        <div id="carousel-example-multi" class="carousel carousel-multi slide">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox" style="background: transparent;">
                                <div class="item active">
                                    <div class="media media-card">
                                        <div class="card">
                                            <img src="{{ asset('images/ben.png') }}" alt="ben" style="width:100%">
                                            <div class="desc-box">
                                                <div class="fb-icon"><a href="#"><img src="{{ asset('images/fb-icon.png') }}"></a></div>
                                                <h4 class="member-title">James Vaughan</h4>
                                                <p class="job-role">Co-Founder / Managing Director</p>
                                                <hr class="member-sep">
                                                <p class="box-email">James@trade-2-trade.co.uk</p>
                                                <p class="linked-in"><a href="https://www.linkedin.com/in/james-vaughan-0420b752/">Connect on LinkedIn</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="media media-card">
                                        <div class="card">
                                            <img src="{{ asset('images/jon.png') }}" alt="jon" style="width:100%">
                                            <div class="desc-box">
                                                <div class="fb-icon"><a href="#"><img src="{{ asset('images/fb-icon.png') }}"></a></div>
                                                <h4 class="member-title">Jon Vaughan</h4>
                                                <p class="job-role">CTO / IT Director</p>
                                                <hr class="member-sep">
                                                <p class="box-email">Jon@trade-2-trade.co.uk</p>
                                                <p class="linked-in"><a href="https://www.linkedin.com/in/jonathan-vaughan-rya-a117b241/">Connect on LinkedIn</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="media media-card">
                                        <div class="card">
                                            <img src="{{ asset('images/james.png') }}" alt="james" style="width:100%">
                                            <div class="desc-box">
                                                <div class="fb-icon"><a href="#"><img src="{{ asset('images/fb-icon.png') }}"></a></div>
                                                <h4 class="member-title">Ben Mitchell</h4>
                                                <p class="job-role">Co-Founder / CEO</p>
                                                <hr class="member-sep">
                                                <p class="box-email">Ben@trade-2-trade.co.uk</p>
                                                <p class="linked-in"><a href="https://www.linkedin.com/in/ben-mitchell-a8545a154/">Connect on LinkedIn</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="media media-card">
                                        <div class="card">
                                            <img src="{{ asset('images/james.png') }}" alt="james" style="width:100%">
                                            <div class="desc-box">
                                                <div class="fb-icon"><a href="#"><img src="{{ asset('images/fb-icon.png') }}"></a></div>
                                                <h4 class="member-title">Zoe Johnson</h4>
                                                <p class="job-role">Senior Customer Liaison Manager</p>
                                                <hr class="member-sep">
                                                <p class="box-email">Zoe@trade-2-trade.co.uk</p>
                                                <p class="linked-in"><a href="# ">Connect on LinkedIn</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="media media-card">
                                        <div class="card">
                                            <img src="{{ asset('images/james.png') }}" alt="james" style="width:100%">
                                            <div class="desc-box">
                                                <div class="fb-icon"><a href="#"><img src="{{ asset('images/fb-icon.png') }}"></a></div>
                                                <h4 class="member-title">Jack <Bell></Bell></h4>
                                                <p class="job-role">Customer Service</p>
                                                <hr class="member-sep">
                                                <p class="box-email">Jack@trade-2-trade.co.uk</p>
                                                <p class="linked-in"><a href="#">Connect on LinkedIn</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="sec-cls trade-safe-sec">
    <div class="container trade-safe-con">
        <div class="row trade-safe-roe">
            <div class="col-sm-6 col-lg-6 trade-safe-col-lft resp-100">
                <div class="trade-safe-col-lft-inner row">
                    <div class="inner-content-block col-sm-6">
                        <h2 class="download-app">Download<br>Our app</h2>
                        <a href="#"><button class="download-btn iphone-btn"><img src="{{ asset('images/iphone.png') }}"> For iOS</button></a>
                        <a href="#"><button class="download-btn android-btn"><img src="{{ asset('images/android.png') }}"> For Android</button></a>
                    </div>
                    <div class="col-sm-6 d-none d-md-block">
                        <div class="app-img"><img src="{{ asset('images/app.png') }}"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-6 trade-safe-col-rgt resp-100 d-none">
                <div class="trade-safe-col-rgt-inner row">
                    <div class="inner-content-block col-sm-6">
                        <h2 class="download-app">How to<br>Trade safe</h2>
                        <a href=""#><button class="find-more">Find out more</button></a>
                    </div>
                    <div class="col-sm-6">
                        <div class="trade-img"><img src="{{ asset('images/trade.png') }}"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
