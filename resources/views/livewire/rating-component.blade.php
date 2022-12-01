<div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/app/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/app/traders">Rate Trader</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="form-sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-6">
                    <h2 class="all-cars-cls">Rate Trader</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="results-sec mt-5">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="bg-light-grey p-5 border-radius-20">
                        <p>{{ucfirst($soldUser->name)}}, you bought {{strtoupper($post->make->name)}} {{strtoupper($post->models->name)}} from {{ ucfirst($post->user->name) }}.</p>
                        <p>Please rate your buying experience below.</p>
                        <div class="form-row">
                            <div class="col-md-12">
                                @if($message)
                                    <div class="alert alert-success" role="alert">
                                        {{$message}}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                    <input {{$disabled ? 'disabled' : ''}} class="form-check-input" type="radio" name="inlineRadioOptions" id="rating11" value="1" wire:model="rating">
                                    <label class="form-check-label" for="rating1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input {{$disabled ? 'disabled' : ''}} class="form-check-input" type="radio" name="inlineRadioOptions" id="rating2" value="2" wire:model="rating">
                                    <label class="form-check-label" for="rating2">2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input {{$disabled ? 'disabled' : ''}} class="form-check-input" type="radio" name="inlineRadioOptions" id="rating3" value="3" wire:model="rating">
                                    <label class="form-check-label" for="rating3">3</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input {{$disabled ? 'disabled' : ''}} class="form-check-input" type="radio" name="inlineRadioOptions" id="rating4" value="4" wire:model="rating">
                                    <label class="form-check-label" for="rating4">4</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input {{$disabled ? 'disabled' : ''}} class="form-check-input" type="radio" name="inlineRadioOptions" id="rating5" value="5" wire:model="rating">
                                    <label class="form-check-label" for="rating5">5</label>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button {{$disabled ? 'disabled' : ''}} class="btn btn-primary" wire:click="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
