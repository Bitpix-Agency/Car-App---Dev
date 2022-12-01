<div>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/app/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Traders</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="form-sec-full">
        <div class="container all-vh-form">
            <form>
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="years" placeholder="Name" wire:model="name">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="registartionprice" placeholder="Location" wire:model="location">
                    </div>
                    <div class="col-md-3">
                        <a href="#" wire:click="clear"><span class="clear-cls">Clear all</span> </a>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="form-sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-6">
                    <h2 class="all-cars-cls">All Traders</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="results-sec">
        <div class="container">
            <div class="row result-row">
                <div class="col-sm-6 col-lg-6">
                    <h2 class="results-cls">Total Traders: {{$traders->total()}}</h2>
                </div>
                <div class="col-sm-6 col-lg-6 list-grid-icon d-none">
                    <span class="sort-by">Sort by: </span>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Date Listed: Newest</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="row car-row-lst">
                <div class="col-md-12 col-lg-12">
                    <div class="row">
                        @foreach($traders as $trader)
                            <div class="col-md-4">
                                <div class="card border-grey">
                                    <div class="card-img-header" style="background-image: url({{$trader->profile->profile_image ?? '/images/trader-placeholder.jpg'}})"></div>
                                    <div class="card-body bg-white">
                                        <div class="row mb-3">
                                            <div class="col-6 text-grey text-xs">
                                                Member since:<br>
                                                {{$trader->created_at->todatestring()}}
                                            </div>
                                            @if($trader->profile->city)
                                            <div class="col-6 text-grey text-xs">
                                                <span class="float-right">
                                                    <i class="fas fa-map-marker-alt"></i> {{$trader->profile->city ?? "Nowhere"}}
                                                </span>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-8">
                                                <h5 class="card-title text-black pt-2">{{ucfirst($trader->name)}}</h5>
                                            </div>
                                            <div class="col-md-4">
                                                @if(Auth::id() == $trader->id)
                                                <a href="/app/account/profile"
                                                   class="btn btn-primary btn-trader btn-block">View</a>
                                                @else
                                                    <a href="/app/trader/{{$trader->id}}"
                                                       class="btn btn-primary btn-trader btn-block">View</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <nav aria-label="...">
                                <ul class="pagination">
                                    {{ $traders->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- pagination end -->

                </div>
            </div>
        </div>
    </section>

</div>
