<!DOCTYPE html>
<html>
<head>
	<title>@yield('title', 'Trade-To-Trade') - {{ env('APP_NAME') }}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/431c4e3525.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0&appId=213378959164126&autoLogAppEvents=1" nonce="03RnJATw"></script>

    <section class="login-section">
        <div class="container-fluid login-container">
            <div class="row login-row">
                <div class="col-sm-4 col-lg-4 center d-flex align-items-center bd-highlight lft">
                    <div class="flex-div">
                        <div class="img-div">
                            <a href="/">
                                <img src="{{ asset('images/t2t-logo.png') }}" class="img-fluid w-50">
                            </a>
                        </div>
                        <img src="{{ asset('images/new-uca.jpg') }}" class="img-fluid w-25 mt-5 d-none d-lg-inline-block ">
                        <img src="{{ asset('images/new-cdp.jpg') }}" class="img-fluid w-25 mt-5 d-none d-lg-inline-block ">
                        <p class="text-white d-none d-lg-block m-3">The UK’s No. 1 award winning used vehicle trade platform</p>
                        <div class="img-div car-img-div d-none d-lg-block">
                            <img src="{{ asset('images/car.png') }}" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-lg-8 mt-50 d-flex align-items-center bd-highlight mb-3">
                    <div class="">
                        @yield('content')
                        <div class="copyright-area">
                            <p>{{ now()->year }} © {{ env('COPYRIGHT') }}. <a href="/support" class="text-orange">Help & Support.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/min/dropzone.min.js"></script>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @livewireScripts
</body>
</html>
