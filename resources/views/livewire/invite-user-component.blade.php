<div>
    <div class="row">
        @if($message)
            {{$message}}
        @endif
        <div class="col-md-4">
            <label>Enter a users email to invite them to your account</label>
            <input type="text" class="form-control" wire:model="email">
            @error('email') <span class="error">{{ $message }}</span> @enderror
            <label>Enter a users name</label>
            <input type="text" class="form-control" wire:model="name">
            @error('name') <span class="error">{{ $message }}</span> @enderror
            <a wire:click="submit" class="btn btn-primary bg-orange border-0 py-2 px-5 mt-4">Invite</a>
        </div>
    </div>
</div>
