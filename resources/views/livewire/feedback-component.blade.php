<div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/app/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/app/account/account">Account</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Feedback</li>
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
                    <h2 class="all-cars-cls">Feedback</h2>
                </div>
                <div class="col-sm-12 col-lg-8">
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <a href="/app/account/feedback" class="btn btn-account active btn-block mb-3 mb-sm-0">Feedback</a>
                        </div>
                        <div class="col-md-3 col-12">
                            <a href="/app/account/listings" class="btn btn-account btn-block mb-3 mb-sm-0">My Listings</a>
                        </div>
                        <div class="col-md-3 col-12">
                            <a href="/app/account" class="btn btn-account btn-block mb-3 mb-sm-0">Account</a>
                        </div>
                        <div class="col-md-3 col-12">
                            <a href="/logout" class="btn btn-account btn-block mb-3 mb-sm-0">Sign Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="results-sec mt-5">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="bg-light-grey p-5 border-radius-20">
                        <p>Have you noticed a bug? Or do you have an idea for a new app feature?</p>
                        <div class="form-row">
                            <div class="col-md-12">
                                    @if($success)
                                        <div class="alert alert-success" role="alert">
                                            {{$success}}
                                        </div>
                                    @endif
                                </div>
                            <div class="col-md-12">
                                <textarea class="form-control w-100" rows="10" wire:model="feedback"></textarea>
                                <button class="btn btn-primary" wire:click="submit">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
