<div>
    {{--    {{dd($trader->profile->profile_image)}}--}}
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/app/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/app/traders">All Traders</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ucfirst($trader->name)}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    @if($voted)
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-warning" role="alert">
                           You have already voted.
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($messageSent)
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert">
                            {{$messageSent}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="form-sec py-10">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="row mb-sm-0 mb-5">
                        <div class="col-md-4 col-12">
                            <img
                            src="{{$trader->profile->profile_image ?? "/images/person.png"}}"
                            onerror="this.onerror=null;this.src='/images/person.png';"
                            class="img-rounded">
                        </div>
                        <div class="col-md-8 col-12">
                            <h3 class="d-inline">{{ucfirst($trader->name ?? "No Name")}}</h3>
                            @if($trader->profile->job)
                                <p class="text-grey">{{ucfirst($trader->profile->job ?? "No Job")}}</p>
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
                            <p class="text-dark-grey">{{ucfirst($trader->profile->user_bio ?? "No Bio")}}</p>
                            @if($trader->profile->phone_no)
                            <p class="text-black mb-2">
                                <a href="tel:{{$trader->profile->phone_no ?? "No Phone"}}" class="text-black">
                                    <i class="fas fa-phone"></i>
                                    {{$trader->profile->phone_no ?? "No Phone"}}
                                </a>
                            </p>
                            @endif
                            @if($trader->profile->phone_no)
                            <p class="text-black mb-2">
                                <a href="https://api.whatsapp.com/send?phone=44{{$trader->profile->phone_no}}&text=Hi%20I%20found%20you%20on%20Trade%202%20Trade..." class="text-black">
                                    <i class="fab fa-whatsapp"></i>
                                    Chat on Whatsapp
                                </a>
                            </p>
                            @endif
                            <p class="text-black mb-2"><i class="fas fa-envelope"></i> {{$trader->email ?? "No Email"}}
                            </p>
                            <div class="row mt-4">
                                <div class="col-md-6 col-6">
                                    <p class="text-black my-4"><strong>{{$votes}}</strong> Upvotes</p>
                                </div>
                                <div class="col-md-6 col-6">
                                    <button class="btn btn-primary btn-trader text-white" type="button"
                                            wire:click="upvote"><i class="fas fa-thumbs-up "></i> Upvote
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 offset-md-1">

                    <textarea class="form-control border-light-grey" rows="9"
                              placeholder="Message {{ucfirst($trader->name)}}..." wire:model="message"></textarea>
                    <button class="btn btn-primary btn-trader mt-3 float-right" type="button"
                            wire:click="message">Send
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section class="results-sec" id="account">
        <div class="container">
            <div class="row result-row">
                <div class="col-md-12 text-center">
                    <h2 class="results-cls">More from this seller</h2>
                </div>
            </div>

                <div class="row">
                    @foreach($trader->posts as $post)
                    <div class="col-md-4">
                        <div class="card veh-img-col">
                            <a href="/app/post/{{ $post->id }}">
                                <div class="card-img-header" style="background-image: url({{ $post->images[0]['url'] ?? asset('images/placeholder-img.jpg') }})">
                                    @if($post->is_sold == true)
                                        <span class="carsold">Sold</span>
                                    @endif
                                </div>
                            </a>
                            <div class="card-body bg-black">
                                <h5 class="card-title text-white small-title">
                                    <a href="/app/post/{{ $post->id }}" class="text-white">
                                        {{$post->title ?? $post->make->name . " " . $post->models->name}}
                                    </a>
                                </h5>
                                <span
                                    class="price-block text-white small-price">£{{number_format($post->price, 2, '.', '')}}</span>
                                <hr class="sep">
                                <div class="row">
                                    <div class="col-sm-12 small-card-auto">
                                        <span class="btn year-bt">2021</span><span class="auto-cls">{{$post->mileage}} miles</span><span
                                            class="petrol-cls">{{$post->with('fuelType')->first()->fuelType->name}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

        </div>
    </section>
</div>
