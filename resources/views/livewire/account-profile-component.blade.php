<div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/app/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Account</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="form-sec py-10">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{$user->profile->profile_image ?? "/images/person.png"}}" class="img-rounded">
                        </div>
                        <div class="col-md-9">
                            <h1 class="d-inline">{{ucfirst($user->name)}}
                                <a href="/app/account">
                                    <small class="text-orange font-sm">Edit</small>
                                </a>
                            </h1>
                            @if ($user->profile->job)
                            <p class="text-grey"> {{ucfirst($user->profile->job)}}</p>
                            @endif
                            <p>
                                @for ($i = 0; $i < 5; $i++)
                                    @if (floor($rating) - $i >= 1)
                                        <i class="fas fa-star text-sm"> </i>
                                    @elseif ($rating - $i > 0)
                                        <i class="fas fa-star-half-alt text-sm"> </i>
                                    @else
                                        <i class="far fa-star text-sm"> </i>
                                    @endif
                                @endfor
                            </p>
                            @if ($user->profile->user_bio)
                            <p class="text-dark-grey">{{ucfirst($user->profile->user_bio)}}</p>
                            @endif
                            @if ($user->profile->phone_no)
                            <p class="text-black mb-2"><i class="fas fa-phone"></i> {{$user->profile->phone_no ?? "No Phone"}}</p>
                            @endif
                            @if ($user->profile->email)
                            <p class="text-black mb-2"><i class="fas fa-envelope"></i> {{$user->email ?? "No email"}}</p>
                            @endif
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <p class="text-black"><strong>{{$upvotes ?? 0}}</strong> Upvotes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="results-sec mb-5" id="account">
        <div class="container">
            <div class="row result-row">
                <div class="col-md-12 text-center">
                    <h2 class="results-cls">Your Vehicles For Sale</h2>
                </div>
            </div>

            <div class="row car-row-lst">
                <div class="col-md-12 col-lg-12">
                    <div class="row">
                        @foreach($user->posts as $post)
                        <div class="col-md-4">
                            <div class="card veh-img-col">
                                <div class="card-img-header 12" style="background-image: url({{ $post->images[0]['url'] ?? asset('images/placeholder-img.jpg') }})">
                                    @if($post->is_sold == true)
                                        <span class="carsold">Sold</span>
                                    @endif
                                </div>
                                <div class="card-body bg-black">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="/app/post/{{ $post->id }}" class="text-white">
                                                <h5 class="card-title small-title text-white">{{$post->title ?? $post->make->name . " " . $post->models->name}}</h5>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="price-block text-white small-price float-right">£{{number_format($post->price, 2, '.', '')}}</span>
                                        </div>
                                    </div>
                                    <hr class="sep">
                                    <div class="row">
                                        <div class="col-sm-12 small-card-auto">
                                            <span class="btn year-bt">{{$post->year}}</span>
                                            <span class="auto-cls">{{$post->mileage}} miles</span>
                                            <span class="petrol-cls">{{$post->with('fuelType')->first()->fuelType->name}}</span>
                                            <span>
                                            <a href="/app/account/edit-listings/{{$post->id}}">
                                                <i class="fas fa-pencil-alt font-sm text-white float-right"></i>
                                            </a>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
