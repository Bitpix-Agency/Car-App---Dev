<div class="col-sm-8 col-lg-8 mt-50 align-items-center bd-highlight mb-3">
    <div class="row">
        <div class="col-md-6">
            <span class="create-acc">Sign In</span>
            <div class="icon-button-div">
                <div class="row align-items-center">
                    <form class="form-signin">
                        <div class>
                            <a href="/auth/login/email"
                               class="btn btn-primary bg-orange border-0 btn-block text-left"><i
                                    class="fas fa-envelope"></i> Login with Email</a>
                        </div>
                        <hr class="my-4">
                        <div>
                            <a href="/auth/login/facebook" class="btn btn-primary bg-blue border-0 btn-block text-left"><i
                                    class="fab fa-facebook-f text-white"></i> Login with Facebook</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-sm-0 mt-5">
            <h3 class="mb-0"></h3>
            <span class="create-acc">Register for an account</span>
            <div class="row mt-5">
                <div class="col-sm-12 col-lg-12 pt-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="firstname" placeholder="First Name"
                               name="firstname" wire:model="firstname">
                        @error('firstname') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-sm-12 col-lg-12">
                    <hr class="my-2">
                </div>
                <div class=" col-sm-12 col-lg-12">
                    <div class="form-group pt-3">
                        <input type="text" class="form-control" id="lastname" placeholder="Last Name"
                               name="lastname" wire:model="lastname">
                        @error('lastname') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-sm-12 col-lg-12">
                    <hr class="my-2">
                </div>
                <div class=" col-sm-12 col-lg-12">
                    <div class="form-group pt-3">
                        <input type="text" class="form-control" id="email" placeholder="Email Address"
                               name="email" wire:model="email">
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class=" col-sm-12 col-lg-12">
                    <div class="form-group">
                        <button class=" btn btn-link text-orange float-right" wire:click="reg">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-area">
        <p>{{ now()->year }} © {{ env('COPYRIGHT') }}. <a href="/support" class="text-orange">Help & Support.</a></p>
    </div>
</div>

