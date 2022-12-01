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
    <section class="form-sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-4">
                    <h2 class="all-cars-cls">Account</h2>
                </div>
                <div class="col-sm-12 col-lg-8">
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <a href="/app/account/feedback" class="btn btn-account btn-block mb-3 mb-sm-0">Feedback</a>
                        </div>
                        <div class="col-md-3 col-12">
                            <a href="/app/account/listings" class="btn btn-account btn-block mb-3 mb-sm-0">My Listings</a>
                        </div>
                        <div class="col-md-3 col-12">
                            <a href="/app/account" class="btn btn-account btn-block mb-3 mb-sm-0 active">Account</a>
                        </div>
                        <div class="col-md-3 col-12">
                            <a href="/logout" class="btn btn-account btn-block mb-3 mb-sm-0">Sign Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="results-sec mt-5 mb-5" id="account">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <!-- Desktop nav -->
                    <ul class="list-inline desktop-nav">
                        <li class="list-inline-item active">
                            <a href="/app/account" class="account-link text-black">Account Details</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="/app/account/password" class="account-link text-black">Change Password</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="/app/account/billing" class="account-link text-black">Billing</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="/app/account/invoices" class="account-link text-black">Invoices</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="/app/account/subscription" class="account-link text-black">Subscription</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="/app/account/users" class="account-link text-black">Users</a>
                        </li>
                    </ul>
                    <!-- End Desktop Nav -->

                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="bg-light-grey p-5 border-radius-20">

                        <h5>Your contact details</h5>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                @if($message)
                                    <div class="alert alert-success" role="alert">
                                        {{$message}}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label id="">Full Name</label>
                                        <input wire:model="name" type="text" class="form-control"
                                               placeholder="{{$user->name}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Company Name</label>
                                        <input wire:model="companyName" type="text"
                                               placeholder="{{$user->profile->job ?? "Enter Company Name"}}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <label>Email Address</label>
                                        <input wire:model="email" type="text" placeholder="{{$user->email}}"
                                               class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Phone Number</label>
                                        <input wire:model="phoneNumber" type="text"
                                               placeholder="{{$user->profile->phone_no ?? "Enter your Phone Number"}}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="section-location mt-5">
                                    <div class="row align-items-end mt-4">
                                        <div class="col-sm-12 col-lg-4">
                                            <label>Latitude</label>
                                            <input type="text" class="form-control" id="lat" name="lat"
                                                   placeholder="{{$user->profile->lat ?? 0}}" disabled required
                                                   wire:model="lat">
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <label>Longitude</label>
                                            <input type="text" class="form-control" id="lng" name="lng"
                                                   placeholder="{{$user->profile->lng ?? 0}}" disabled
                                                   required
                                                   wire:model="lng">
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <button class="btn btn-secondary nextBtn btn-lg btn-block h-75 mt-0 "
                                                    onclick="getLocation()">
                                                    Update Location
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="section-bio mt-5">
                                    <div class="section-bio mt-5">
                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <label>Bio</label>
                                                <textarea wire:model="bio" type="text" class="form-control" rows="10"
                                                          placeholder="{{$user->profile->user_bio ?? "Add a description about yourself and your company"}}"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-4 text-center">
                                    <div class="profile-pic rounded">
                                        @if ($photo)
                                            <div class="profile-pic_img new rounded" style="background:url({{ $photo->temporaryUrl() }})"></div>
                                        @else
                                            <div class="profile-pic_img old rounded" style="background:url({{$user->profile->profile_image ?? "no image"}})"></div>
                                        @endif
                                        <div class="row mt-4">
                                            <div class="col-sm-12 col-lg-12 form-reg-mthd">
                                                <label for="photo"
                                                       class="btn btn-primary btn-dashed w-100 border border-secondary border-dashed bg-white text-muted p-3"
                                                />
                                                Choose an image
                                                </label>
                                                <input id="photo" type="file" wire:model="photo" class="d-none">
                                                @error('photo')
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" wire:click="update">Update Profile</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
    </section>
</div>
<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;
        window.livewire.emit('set:latitude-longitude', latitude, longitude)
    }
</script>
