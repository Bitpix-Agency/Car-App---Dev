<div class="col-sm-12 col-lg-12">
    @if($error)
        <div style="font-size: x-large">
            Incorrect Details Try Again
        </div>
    @endif
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" wire:model="email">
        @error('email') <span class="error">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <label class="forgot-pass" for="forgotPassword1">
            <a href="/forgotPassword">Forgot Password?</a>
        </label>
        <input type="password" class="form-control" id="password" name="password" wire:model="password">
        @error('password') <span class="error">{{ $message }}</span> @enderror
    </div>
    <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="login"
            type="button">Sign In
    </button>
</div>
