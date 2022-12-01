@if (Auth::check())
<nav class="navbar navbar-expand-lg navbar-dark bg-blue mb-0 rounded-0 vehicle-header-cls">
    <a class="navbar-brand" href="/app/dashboard">
        <img src="{{ asset('images/t2t-logo.png') }}" class="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto lft-nav">
            <li class="nav-item">
                <a class="nav-link" href="/app/dashboard">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/app/posts">Listings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/app/traders">Traders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/app/leaderboard">Leaderboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/app/alerts">Alerts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/app/inbox">Inbox</a>
            </li>
            <li class="nav-item d-none sm-visible">
                <a href="/app/account/listings/create" class="nav-link">Sell Vehicle</a>
            </li>
            <li class="nav-item d-none sm-visible">
                <a class="nav-link" href="/support">Support</a>
            </li>
            <li class="nav-item d-none sm-visible">
                <a class="nav-link" href="/app/account">My Account</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto account-menu">
            <li class="nav-item dropdown mt-0">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img alt="Image placeholder" class="rounded-circle max-w-40px h-40px mr-2" src="{{auth()->user()->profile->profile_image ?? "/images/person.png"}}">
                    {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/app/account/profile">Profile</a>
                    <a class="dropdown-item" href="/app/account/listings">My Listings</a>
                    <a class="dropdown-item" href="/app/account">Account</a>
                    <a class="dropdown-item" href="/support">Support</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/logout">Log out</a>
                </div>
            </li>
            <li class="nav-item btn">
                <a class="nav-link btn-link" href="/app/account/listings/create">Sell Vehicle</a>
            </li>
        </ul>
    </div>
</nav>
@else
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <a class="navbar-brand" href="#"><img src="{{ asset('images/Logo-dash.png') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item btn">
                    <a class="nav-link btn-link" href="/">Login</a>
                </li>
            </ul>
        </div>
    </nav>
@endif
