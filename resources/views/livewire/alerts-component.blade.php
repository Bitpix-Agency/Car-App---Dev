<div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/app/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Cars</li>
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
                    <h2 class="all-cars-cls">All Alerts</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="results-sec mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bg-light-grey p-5 border-radius-20">
                        @if($message)
                            <p>{{$message}}</p>
                        @endif
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th scope="col">Date Created</th>
                                        <th scope="col">Make</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Mileage</th>
                                        <th scope="col">Price</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="border-0">
                                    @foreach($alerts as $alert)
                                        <tr class="py-5">
                                            <td>{{$alert->updated_at ?? ""}}</td>
                                            <td>{{$alert->make->name ?? ""}}</td>
                                            <td>{{$alert->models->name ?? ""}}</td>
                                            <td>{{$alert->body_type ?? ""}}</td>
                                            <td>{{$alert->year ?? ""}}</td>
                                            <td>{{$alert->mileage ?? ""}}</td>
                                            <td>£{{number_format($alert->min_price, 2, '.', '') ?? ""}}</td>
                                            <td><a wire:click="delete({{$alert->id}})" class="text-orange">Remove</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
