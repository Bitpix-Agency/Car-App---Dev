<div>
    <span class="create-acc">Request a Password Reset Link</span>
    @if($message)
        <h1>{{$message}}</h1>
    @endif
    <div class="icon-button-div form-dv">
        <div class="row align-items-center">
            <div class="col-sm-12 col-lg-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                               placeholder="" wire:model="email" required>
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" wire:click="sendpassword">Send Reset Link</button>
            </div>
        </div>
    </div>
</div>
