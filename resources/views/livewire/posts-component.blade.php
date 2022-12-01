<div class="col-sm-6 col-lg-6 left-col-grid">
    <div class="card">
        <a href="/app/post/{{$posts[0]['id'] ?? 1}}">
            <div class="large-card-img"
                 style="background:url({{ $posts[0]['images'][0]['url'] ?? asset('images/placeholder-img.jpg') }})"></div>
        </a>
        <div class="card-body bg-black">
            <a href="/app/post/{{$posts[0]['id'] ?? 1}}">
                <h5 class="card-title text-white">{{$posts[0]['title'] ?? $posts[0]->make->name . " " . $posts[0]->models->name}}</h5>
            </a>
            <hr class="sep">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-8 card-left">
                        <span class="btn year-bt">{{$posts[0]['year'] ?? 'Placement Year'}}</span><span
                            class="auto-cls">{{$posts[0]['transition'] ?? 'Placement Transmission'}}</span><span
                            class="petrol-cls">{{$posts[0]->fuelType->name ?? 'Petrol Placement'}}</span>
                    </div>
                    <div class="col-sm-4 price-div">
                        <span class="price-block text-white">£{{$posts[0]['price'] ?? 'Placement Price'}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-6 col-lg-6  tab-cls">
    <div class="row right-grid">
        <!-- <div class="col-sm-12"> -->
        <div class="col-sm-6 col-lg-6 inner-col">
            <div class="card">
                <a href="/app/post/{{$posts[1]['id'] ?? 1}}">
                    <div class="small-card-img"
                         style="background:url({{ $posts[1]['images'][0]['url'] ?? asset('images/placeholder-img.jpg') }})"></div>
                </a>
                <div class="card-body bg-black">
                    <a href="/app/post/{{$posts[1]['id'] ?? 1}}">
                        <h5 class="card-title small-title text-white">{{$posts[1]['title'] ?? $posts[1]->make->name . " " . $posts[1]->models->name}}</h5>
                    </a>
                    <span class="price-block small-price text-white">£{{$posts[1]['price'] ?? 'Placement Price'}}</span>
                    <hr class="sep">
                    <div class="row">
                        <div class="col-sm-12 small-card-auto">
                            <span class="btn year-bt">{{$posts[1]['year'] ?? 'Placement Year'}}</span><span
                                class="auto-cls">{{$posts[1]['transition'] ?? 'Placement Transmission'}}</span><span
                                class="petrol-cls">{{$posts[1]->fuelType->name ?? 'Petrol Placement'}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-6 inner-col">
            <div class="card">
                <a href="/app/post/{{$posts[2]['id'] ?? 1}}">
                    <div class="small-card-img"
                         style="background:url({{ $posts[2]['images'][0]['url'] ?? asset('images/placeholder-img.jpg') }})"></div>
                </a>
                <div class="card-body bg-black">
                    <a href="/app/post/{{$posts[2]['id'] ?? 1}}">
                        <h5 class="card-title small-title text-white">{{$posts[2]['title'] ?? $posts[2]->make->name . " " . $posts[2]->models->name}}</h5>
                    </a>
                    <span class="price-block small-price text-white">£{{$posts[2]['price'] ?? 'Placement Price'}}</span>
                    <hr class="sep">
                    <div class="row">
                        <div class="col-sm-12 small-card-auto">
                            <span class="btn year-bt">{{$posts[2]['year'] ?? 'Placement Year'}}</span><span
                                class="auto-cls">{{$posts[2]['transition'] ?? 'Placement Transmission'}}</span><span
                                class="petrol-cls">{{$posts[2]->fuelType->name ?? 'Petrol Placement'}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row right-grid ">
        <div class="col-sm-6 col-lg-6 inner-col">
            <div class="card">
                <a href="/app/post/{{$posts[3]['id'] ?? 1}}">
                    <div class="small-card-img"
                         style="background:url({{ $posts[3]['images'][0]['url'] ?? asset('images/placeholder-img.jpg') }})"></div>
                </a>
                <div class="card-body bg-black">
                    <a href="/app/post/{{$posts[3]['id'] ?? 1}}">
                        <h5 class="card-title small-title text-white">{{$posts[3]['title'] ?? $posts[3]->make->name . " " . $posts[3]->models->name}}</h5>
                    </a>
                    <span class="price-block small-price text-white">£{{$posts[3]['price'] ?? 'Placement Price'}}</span>
                    <hr class="sep">
                    <div class="row">
                        <div class="col-sm-12 small-card-auto">
                            <span class="btn year-bt">{{$posts[3]['year'] ?? 'Placement Year'}}</span><span
                                class="auto-cls">{{$posts[3]['transition'] ?? 'Placement Transmission'}}</span><span
                                class="petrol-cls">{{$posts[3]->fuelType->name ?? 'Petrol Placement'}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-6 inner-col">
            <div class="card">
                <a href="/app/post/{{$posts[4]['id'] ?? 1}}">
                    <div class="small-card-img"
                         style="background:url({{ $posts[4]['images'][0]['url'] ?? asset('images/placeholder-img.jpg') }})"></div>
                </a>
                <div class="card-body bg-black">
                    <a href="/app/post/{{$posts[4]['id'] ?? 1}}">
                        <h5 class="card-title small-title text-white">{{$posts[4]['title'] ?? $posts[4]->make->name . " " . $posts[4]->models->name}} </h5>
                    </a>
                    <span class="price-block small-price text-white">£{{$posts[4]['price'] ?? 'Placement Price'}}</span>
                    <hr class="sep">
                    <div class="row">
                        <div class="col-sm-12 small-card-auto">
                            <span class="btn year-bt">{{$posts[4]['year'] ?? 'Placement Year'}}</span><span
                                class="auto-cls">{{$posts[4]['transition'] ?? 'Placement Transmission'}}</span><span
                                class="petrol-cls">{{$posts[4]->fuelType->name ?? 'Petrol Placement'}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
