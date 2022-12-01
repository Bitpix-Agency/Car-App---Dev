<div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/app/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/app/account/account">Account</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Listings</li>
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
                    <h2 class="all-cars-cls">My Listings</h2>
                </div>
                <div class="col-sm-12 col-lg-8">
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <a href="/app/account/feedback" class="btn btn-account btn-block mb-3 mb-sm-0">Feedback</a>
                        </div>
                        <div class="col-md-3 col-12">
                            <a href="/app/account/listings" class="btn btn-account btn-block mb-3 mb-sm-0 active">My Listings</a>
                        </div>
                        <div class="col-md-3 col-12">
                            <a href="/app/account" class="btn btn-account btn-block mb-3 mb-sm-0 ">Account</a>
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
            <div class="row mt-2 mb-4">
                <div class="col-md-12">
                    <a href="/app/account/listings/create" class="btn btn-primary bg-orange border-0 py-3 px-5">New
                        Listing</a>
                </div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col-md-12">
                    <div class="bg-light-grey p-5 border-radius-20">

                        <div class="row car-row-lst">
                            <div class="col-sm-12 col-lg-12">
                                @foreach($posts as $post)
                                    <div class="row car-listing">
                                        <div class="col-4 col-lg-3 veh-img-col">
                                            <div class="vehivleimg-div"
                                                style="background-image: url({{ $post['images'][0]['url'] ?? asset('images/placeholder-img.jpg') }})">
                                                @if($post->is_sold == true)
                                                    <span class="carsold">Sold</span>
                                                @endif
                                                @if($post->rrp)
                                                    <img src="/images/motorcheck-icon.png" class="img-fluid w-25 mc-icon"/>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-8 col-lg-7">
                                            <a href="/app/account/edit-listings/{{$post->id}}">
                                                <h3 class="veh-title">{{$post->title ?? $post->make->name . " " . $post->models->name}} <small>Edit</small></h3>
                                            </a>
                                            <div class="mobile-details d-block d-md-none">
                                                <div class="mobile-features">
                                                    <span class="mobile-features_keys">{{$post->keys}} Keys</span>
                                                    <span class="mobile-features_service">{{$post->service_history}} History</span>
                                                    <span class="mobile-features_prep">£{{$post->prep}} Prep</span>
                                                </div>
                                                <div class="mobile-details-reg">
                                                    <span class="mobile-reg float-left">
                                                        {{$post->regno}}
                                                    </span>
                                                    <span class="mobile-price float-right">
                                                        £{{$post->price}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="small-card-auto vehicle-det mt-3 d-none d-md-block">
                                                <span class="btn year-bt">{{$post->year}}</span>
                                                <span class="auto-cls">{{$post->transition}}</span>
                                                <span class="petrol-cls">{{$post->fuelType->name}}</span>
                                                <span class="front-wheel">{{$post->drive}} Owner</span>
                                            </div>
                                            <div class="small-card-auto vehicle-det mt-3 mb-0 d-none d-md-block">
                                                @if($post->keys)
                                                    <span class="petrol-cls"> {{$post->keys}} Keys</span>
                                                @endif
                                                @if($post->service_history)
                                                    <span class="petrol-cls">{{$post->service_history}} Service History</span>
                                                @endif
                                                @if($post->dealer_history)
                                                    <span class="petrol-cls">{{$post->dealer_history}} Dealer History</span>
                                                @endif
                                                @if($post->vehicle_status)
                                                    <span class="petrol-cls">{{$post->vehicle_status}}</span>
                                                @endif
                                                @if($post->mileage)
                                                    <span class="petrol-cls">{{$post->mileage}} Miles</span>
                                                @endif
                                                @if($post->has_v5)
                                                    <span class="petrol-cls">
                                                        @if ($post->has_v5 == 'Yes')
                                                        V5 Present
                                                        @endif
                                                        @if ($post->has_v5 == 'No')
                                                        V5 Not Present
                                                        @endif
                                                        @if ($post->has_v5 == 'Private Plate')
                                                        Private Plate V5
                                                        @endif
                                                    </span>
                                                @endif
                                                @if($post->prep)
                                                    <span class="petrol-cls">£{{$post->prep}} Prep</span>
                                                @endif
                                                @if($post->mot_expire)
                                                    <span class="petrol-cls">{{$post->mot_expire}} M.O.T</span>
                                                @endif
                                                @if($post->rrp)
                                                    <span class="petrol-cls">£{{number_format($post->rrp, 2, '.', '')}} Retail</span>
                                                @endif

                                            </div>
                                            <div class="location-d d-none">
                                                <span class="loc-title">Location: </span><span
                                                    class="loc-add">{{$post->location}}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-lg-2 d-none d-md-block p-0">
                                            <div class="veh-box mt-1">
                                                <span class="veh-gb">{{$post->regno}}</span>
                                                <img
                                                src="{{ $post->user->profile_img }}"
                                                onerror="this.onerror=null;this.src='/images/person.png';"
                                                class="listing-profile"/>
                                                <div class="veh-price">£{{number_format($post->price, 2, '.', '')}}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
