<div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/app/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/app/traders">Edit Listing</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sold Your Vehicle?</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="form-sec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="all-cars-cls">Sold
                        Your {{strtoupper($post->make->name)}} {{strtoupper($post->models->name)}}?</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="results-sec mt-5 mb-5">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="bg-light-grey p-5 border-radius-20">
                        <p>Congratulations on selling your Vehicle!</p>
                        <ul>
                            <li>Make: {{$post->make->name}}</li>
                            <li>Model: {{$post->models->name}}</li>
                            <li>Listing Price: £{{number_format($post->price, 2, '.', '')}}</li>
                        </ul>

                        <p>We just need to collect a few details from you.</p>

                        @if($message)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success" role="alert">
                                        {{$message}}
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row mt-3 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="checkBox" wire:model="checkBox" {{$disabled ? 'disabled' : ''}} required>
                                <label class="form-check-label pl-3" for="checkBox">
                                    Did you sell you're vehicle on here?
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="searchTerm">Which user bought your vehicle?</label>
                                <input id="searchTerm" type="text" class="form-control"
                                       wire:model="searchTerm" {{$checkBox ? '' : 'disabled'}} required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <select id="userId" class="custom-select mr-sm-2"
                                        wire:model="userId" {{$checkBox ? '' : 'disabled'}} required>
                                    <option selected>Select User</option>
                                    @foreach($users as $user)
                                        <option {{!$disabled ?? 'disabled'}} value="{{$user->id}}">{{$user->name}}
                                            | {{$user->profile->user_name ?? ""}} | {{$user->profile->job ?? ""}}
                                            | {{$user->profile->city ?? ""}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="price">What was the sale price?</label>
                                <input {{$checkBox ? '' : 'disabled'}} id="price" type="text" class="form-control"
                                       wire:model="price" required>
                                @error('price') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <button {{$disabled ? 'disabled' : ''}} class="btn btn-primary" wire:click="submit">Mark
                                    as
                                    sold
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>

</div>
</section>
</div>
