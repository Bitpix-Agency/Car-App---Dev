@extends('layout.app')
@section('title', 'Support')
@section('content')
    <header class="vehicle-header-cls" style="">
        @include('include.navigation')
    </header>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Support</li>
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
                    <h2 class="all-cars-cls">@yield('title')</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default mb-3">
                            <div class="panel-heading">
                                <h3 class="h5">
                                    <a class="accordion-toggle text-black" href="/support/faqs">FAQs <i class="fas fa-chevron-right"></i></a>
                                </h3>
                            </div>
                        </div>
                        <div class="panel panel-default mb-3">
                            <div class="panel-heading">
                                <h3 class="h5">
                                    <a class="accordion-toggle text-black" href="/support/change-email">Request Email Change <i class="fas fa-chevron-right"></i></a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
