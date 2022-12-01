<div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/app/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Cars</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="form-sec-full d-none d-md-block">
        <div class="container all-vh-form">
            <div class="row">
                <div class="col mx-1">
                    <select id="makes" class="custom-select mr-sm-2" wire:model="makeId">
                        <option selected hidden>Select Make</option>
                        @foreach($makes as $make)
                            <option value="{{$make->id}}">{{$make->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col mx-1">
                    <select id="makes" class="custom-select mr-sm-2" wire:model="modelId">
                        <option selected hidden>Select Model</option>
                        @foreach($models as $model)
                            <option value="{{$model->id}}">{{$model->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col mx-1">
                    <select class="custom-select mr-sm-2" id="typeselect">
                        <option value="" selected hidden>Type</option>
                        <option></option>
                    </select>
                </div>
                <div class="col mx-1">
                    <input type="text" class="form-control" id="minprice" placeholder="Min Price" wire:model="minPrice">
                </div>
                <div class="col mx-1">
                    <input type="text" class="form-control" id="mileage" placeholder="Mileage" wire:model="mileage">
                </div>
            </div>
            <div class="row">
                <div class="col mx-1">
                    <input type="text" class="form-control" id="years" placeholder="Years" wire:model="year">
                </div>
                <div class="col mx-1">
                    <select id="makes" class="custom-select mr-sm-2" wire:model="seatId">
                        <option value=''>Seats</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                        <option value='6'>6</option>
                        <option value='7'>7</option>
                    </select>
                </div>
                <div class="col mx-1">
                    <input type="text" class="form-control" id="registartionprice" placeholder="Registration"
                           wire:model="reg">
                </div>
                <div class="col mx-1">
                    <select id="makes" class="custom-select mr-sm-2" wire:model="fuelId">
                        <option value=''>Fuel Type</option>
                        @foreach($fuels as $fuel)
                            <option value={{ $fuel->id }}>{{ $fuel->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col mx-1">
                    <input type="text" class="form-control" id="features" placeholder="Features">
                </div>
            </div>
            <div class="row alert-sec">
                <div class="col-sm-12">
                    @if($message)
                        <p>{{$message}}</p>
                    @endif
                    <a href="#" wire:click="alert"><span class="save-as">Save as Alert</span></a>
                    <a href="#" wire:click="clear"><span class="clear-cls">Clear all</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="form-sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-6">
                    <h2 class="all-cars-cls">All Cars</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="results-sec">
        <div class="container">
            <div class="row result-row">
                <div class="col-sm-6 col-lg-6 d-none d-md-block">
                    <h2 class="results-cls">Total Listing: {{$posts->total()}}</h2>
                </div>
                <div class="col-6 offset-lg-3 col-lg-3 list-grid-icon d-none d-md-block">
                    <select id="makes" class="custom-select mr-sm-2" wire:model="sortBy">
                        <option value="newest-desc" selected>Newest</option>
                        <option value="oldest-asc">Oldest</option>
                        <option value="price-asc">Lowest-Price</option>
                        <option value="price-desc">Highest-Price</option>
                    </select>
                </div>
                <div class="col-6">
                    <a class="btn btn-sort btn-block d-block d-md-none" data-toggle="collapse" href="#sort" role="button" aria-expanded="false" aria-controls="filter">
                        <i class="fas fa-sort"></i> Sort by
                    </a>
                </div>
                <div class="col-6">
                    <a class="btn btn-filter btn-block d-block d-md-none" data-toggle="collapse" href="#filter" role="button" aria-expanded="false" aria-controls="filter">
                        <i class="fas fa-filter"></i> Filter
                    </a>
                </div>
                <div class="collapse d-block d-md-none col-12" id="sort">
                    <select id="makes" class="custom-select mr-sm-2" wire:model="sortBy">
                        <option value="newest-desc" selected>Newest</option>
                        <option value="oldest-asc">Oldest</option>
                        <option value="price-asc">Lowest-Price</option>
                        <option value="price-desc">Highest-Price</option>
                    </select>
                </div>
                <div class="collapse d-block d-md-none col-12" id="filter">
                    <section class="form-sec-full">
                        <div class="container all-vh-form">
                            <div class="row">
                                <div class="col mx-1">
                                    <select id="makes" class="custom-select mr-sm-2" wire:model="makeId">
                                        <option selected hidden>Select Make</option>
                                        @foreach($makes as $make)
                                            <option value="{{$make->id}}">{{$make->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col mx-1">
                                    <select id="makes" class="custom-select mr-sm-2" wire:model="modelId">
                                        <option selected hidden>Select Model</option>
                                        @foreach($models as $model)
                                            <option value="{{$model->id}}">{{$model->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col mx-1">
                                    <select class="custom-select mr-sm-2" id="typeselect">
                                        <option value="" selected hidden>Type</option>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="col mx-1">
                                    <input type="text" class="form-control" id="minprice" placeholder="Min Price" wire:model="minPrice">
                                </div>
                                <div class="col mx-1">
                                    <input type="text" class="form-control" id="mileage" placeholder="Mileage" wire:model="mileage">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mx-1">
                                    <input type="text" class="form-control" id="years" placeholder="Years" wire:model="year">
                                </div>
                                <div class="col mx-1">
                                    <select id="makes" class="custom-select mr-sm-2" wire:model="seatId">
                                        <option value=''>Seats</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                        <option value='4'>4</option>
                                        <option value='5'>5</option>
                                        <option value='6'>6</option>
                                        <option value='7'>7</option>
                                    </select>
                                </div>
                                <div class="col mx-1">
                                    <input type="text" class="form-control" id="registartionprice" placeholder="Registration"
                                           wire:model="reg">
                                </div>
                                <div class="col mx-1">
                                    <select id="makes" class="custom-select mr-sm-2" wire:model="fuelId">
                                        <option value=''>Fuel Type</option>
                                        @foreach($fuels as $fuel)
                                            <option value={{ $fuel->id }}>{{ $fuel->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col mx-1">
                                    <input type="text" class="form-control" id="features" placeholder="Features">
                                </div>
                            </div>
                            <div class="row alert-sec">
                                <div class="col-sm-12">
                                    @if($message)
                                        <p>{{$message}}</p>
                                    @endif
                                    <a href="#" wire:click="alert"><span class="save-as">Save as Alert</span></a>
                                    <a href="#" wire:click="clear"><span class="clear-cls">Clear all</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row car-row-lst" id="Posts">
                <div class="col-sm-10 col-lg-9">
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
                                <a href="/app/post/{{$post->id}}">
                                    <h3 class="veh-title">{{$post->title ?? $post->make->name . " " . $post->models->name}}</h3>
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
                                    <span class="front-wheel">{{$post->owners}} Owners</span>
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
                <!-- Pagination -->
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <nav aria-label="...">
                                <ul class="pagination">
                                    {{ $posts->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- pagination end -->
                </div>
                <div class="col-sm-12 col-lg-3 d-none d-md-block">
                    <h3 class="mb-4 text-right">Our Partners</h3>
                    <div class="partner">
                        <a href="https://www.tmo.co.uk/" target="_blank">
                            <img src="/images/tmo.png" class="img-fluid" alt=""/>
                        </a>
                    </div>
                    <div class="partner">
                        <a href="https://www.finset.co.uk/" target="_blank">
                            <img src="/images/finset.png" class="img-fluid" alt=""/>
                        </a>
                    </div>
                    <div class="partner">
                        <a href="https://www.execinsurance.co.uk/" target="_blank">
                            <img src="/images/executive.png" class="img-fluid" alt=""/>
                        </a>
                    </div>
                    <div class="partner">
                        <a href="http://www.lawgistics.co.uk" target="_blank">
                            <img src="/images/lawgistics.png" class="img-fluid" alt=""/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
