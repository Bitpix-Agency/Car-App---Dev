<div>
    <h3 class="mb-0">{{$invite->premiumUser->name}} has invited you</h3>
    <span class="create-acc">Enter Your Details</span>
    <div class="icon-button-div form-dv">
        <div class="row align-items-center">
            <div class="col-sm-12 col-lg-12 form-reg-mthd">
                    <div class="row">
                        <div class="col-sm-6 col-lg-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input disabled type="text" class="form-control" id="name"  name="name" wire:model="name">
                                @error('name') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-sm-6 col-lg-6">
                            <div class="form-group">
                                <label for="phonenumber">Phone Number</label>
                                <input type="text" class="form-control" id="phonenumber"  name="phonenumber" wire:model="number">
                                @error('number') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class=" col-sm-6 col-lg-6">
                            <div class="form-group">
                                <label for="lastname">Email Address</label>
                                <input disabled type="email" class="form-control" id="lastname"  name="email" wire:model="email">
                                @error('email') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class=" col-sm-6 col-lg-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password"  name="password" wire:model="password">
                                @error('password') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <button wire:click="submit" type="submit" class="btn btn-primary mt-3 next-btn">Join</button>
            </div>
        </div>
    </div>
</div>
