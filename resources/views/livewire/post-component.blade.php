<div>
    <section>
        <div class="container container-fluid main">
            <div class="row">
                <!-- <div class="col-lg-2 left-arrow"><i class="fas fa-angle-left"></i></div> -->
                <div class="col-lg-12 col-sm-12">
                    <!--desktop-->
                    <div class="desk-top mb-3 mt-lg-3 mt-0">
                        <div class="top-section row">
                            <div class="left-sec col-lg-9 col-md-9 col-lg-9">
                                <ul class="list-left">
                                    <li><a href="/app/dashboard">Dashboard</a></li>
                                    <li><a href="/app/posts">All Cars</a></li>
                                    <li class="active">
                                        <a href="#"
                                           class="text-capitalize">{{$post->title ?? $post->make->name . " " . $post->models->name}}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="right-sec col-lg-3 col-md-3 col-lg-3">
                                <ul class="list-right-price">
                                    <li><a class="car-price">£{{number_format($post->price, 2, '.', '')}}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="second-section row">
                            <div class="col-lg-9">
                                <p>
                                    <a class="car-name">{{$post->title ?? $post->make->name . " " . $post->models->name}}</a>
                                    @if(auth()->user()->id == $post->user->id)
                                    <a href="/app/account/edit-listings/{{$post->id}}" class="post-edit-link"><small> (Edit)</small></a>
                                    @endif
                                    @if($post->rrp)
                                        @if(auth()->user()->id != $post->user->id)
                                            <div class="motorcheck-available">
                                                <a href="#motorcheck" class="motorcheck-link">
                                                    <img src="/images/motorcheck-icon.png" class="img-fluid mc-icon"/>
                                                    Run Motor Check Report
                                                </a>
                                            </div>
                                        @endif
                                    @endif
                                </p>
                                <ul class="list-left">
                                    <li>
                                        <a href="tel:{{$post->user->phone_no}}">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            Call
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/app/trader/{{$post->user->id}}">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            Message
                                        </a>
                                    </li>
                                    @if($post->is_sold == 0)
                                        <li wire:click="makeDeal({{$post->user->id}})">
                                            <a href="#" target="_blank">
                                                <i class="fa fa-handshake-o" aria-hidden="true"></i>
                                                Make a deal
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="https://api.whatsapp.com/send?phone=44{{$post->user->profile->phone_no}}&text=Hi%20I%20am%20interested%20in%20your%20{{$post->make->name}}%20{{$post->models->name}}%2C%20{{mb_strtoupper($post->regno)}}%20on%20the%20Trade%202%20Trade%20App" class="text-black" target="_blank">
                                            <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                            Whatsapp
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <div class="row photo-div">
                                    <div class="col-lg-9 photo-dcol">
                                        <div class="photo-d-inner @if ($userProfile->job == null) pt-2 @endif float-right">
                                            <a href="/app/trader/{{$post->user->id}}" class="text-black">
                                                <p class="person-name">{{$post->user->name}}</p>
                                                @if ($userProfile->job)
                                                <p class="person-job">{{$userProfile->job}}</p>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <a href="/app/trader/{{$post->user->id}}" class="text-black">
                                            @if($userProfile && $userProfile->profile_image)
                                                <img src="{{ $userProfile->profile_image }}"
                                                     class="rounded-circle max-w-40px h-40px mr-2">
                                            @else
                                                <img src="{{ asset('images/photo.png') }}"
                                                     class="rounded-circle max-w-40px h-40px mr-2">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--desktop end-->
                    <!--mobile section-->
                    <div class="mobile-top">
                        <div class="container-fluid">
                            <div class="row">
                                <table style="width: 100%;">
                                    <tr>
                                        <td class="left-td-veh">
                                            <p>
                                                <a class="car-name">{{$post->make->name  . " " . $post->models->name ?? "Null"}}</a>
                                            </p>
                                            <p class="mob-car-det"><span
                                                    class="spn-border fst">{{$post->mileage}} miles</span><span
                                                    class="spn-border">{{$post->year}}</span><span>{{$post->regno}}</span>
                                            </p>
                                            <p><a class="car-price">£{{$post->price}}</a></p>
                                        </td>
                                        <td class="rgt-td-veh">
                                            <div class="photo-d-inner2">
                                                <a href="/app/trader/{{$post->user->id}}" class="text-black">
                                                    <p class="person-name">{{$post->user->name}}</p>
                                                </a>
                                                @if ($userProfile->job)
                                                <p class="person-name">{{$post->user->company}}</p>
                                                @endif
                                                <div class="circle">
                                                    <span class="stars-inactive">
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="img-cls-round">
                                            <a href="/app/trader/{{$post->user->id}}">
                                                @if($userProfile && $userProfile->profile_image)
                                                    <img src="{{ $userProfile->profile_image }}"
                                                         class="rounded-circle max-w-40px h-40px mr-2">
                                                @else
                                                    <img src="{{ asset('images/photo.png') }}"
                                                         class="rounded-circle max-w-40px h-40px mr-2">
                                                @endif
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--Mobile end-->
                    <!-- Desktop start -->
                    <div id="slidecar" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($post->images->toArray() as $key => $image)
                                @if ($key === array_key_first($post->images->toArray()))
                                    <div class="carousel-item active text-center">
                                        <img src="{{ $image['url'] ?? asset('images/placeholder-img.jpg') }}"
                                             class="post-img">
                                    </div>
                                @else
                                    <div class="carousel-item text-center">
                                        <img src="{{ $image['url'] ?? asset('images/placeholder-img.jpg')  }}"
                                             class="post-img">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#slidecar" data-slide="prev">
                            <span class="carousel-control-prev-icon"><img src="{{ asset('images/prev.png') }}"></span>
                        </a>
                        <a class="carousel-control-next" href="#slidecar" data-slide="next">
                            <span class="carousel-control-next-icon"><img src="{{ asset('images/next.png') }}"></span>
                        </a>
                    </div>
                    <!-- Desktop End -->
                    <!---- Mobile Start------->
                    <div class=" mobile-top mob-icons container-fluid">
                        <div class="list-left row">
                            <div class="col-12 mb-3 mb-sm-0">
                                <p>Interested in this vehicle?</p>
                            </div>
                            <div class="col-6 mb-3 mb-sm-0">
                                <a class="btn btn-block" href="tel:{{$post->user->phone_no}}">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    Call
                                </a>
                            </div>
                            <div class="col-6 mb-3 mb-sm-0">
                                <a class="btn btn-block" href="/app/trader/{{$post->user->id}}">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    Message
                                </a>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-block" target="_blank" href="https://api.whatsapp.com/send?phone=44{{$post->user->profile->phone_no}}&text=Hi%20I%20am%20interested%20in%20your%20{{$post->make->name}}%20{{$post->models->name}}%2C%20{{mb_strtoupper($post->regno)}}%20on%20the%20Trade%202%20Trade%20App" class="text-black">
                                    <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                    Whatsapp
                                </a>
                            </div>
                            @if($post->is_sold == 0)
                                <div class="col-6">
                                    <a class="btn btn-block" href="#" wire:click="makeDeal({{$post->user->id}})">
                                        <i class="fa fa-handshake-o" aria-hidden="true"></i>
                                        Deal
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!----- Mobile End ----->
                    <div class="row seven-cols">
                        <div class="col-md-1 col-6 d-md-block d-none">
                            <p class="serviceItem text-left d-none d-md-block">Mileage</p>
                            <p class="sml-text d-inline">{{$post->mileage ?? "Not Supplied"}}</p>
                            <hr class="d-md-none d-block serviceItemSeperator">
                        </div>
                        <div class="col-md-1 col-6">
                            <div class="serviceItemBox">
                                <div class="svgImg d-md-none d-inline">
                                    <svg width="15" height="auto" viewBox="0 0 19 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.125 10.2653H8.33333V4.78762C7.93616 4.50523 7.62575 4.06932 7.45025 3.54752C7.27475 3.02572 7.24396 2.44718 7.36265 1.90163C7.48135 1.35608 7.7429 0.874014 8.10675 0.530189C8.47059 0.186364 8.91639 0 9.375 0C9.83361 0 10.2794 0.186364 10.6433 0.530189C11.0071 0.874014 11.2686 1.35608 11.3873 1.90163C11.506 2.44718 11.4753 3.02572 11.2997 3.54752C11.1242 4.06932 10.8138 4.50523 10.4167 4.78762V10.2653H14.5833C14.8596 10.2653 15.1246 10.1302 15.3199 9.88961C15.5153 9.64903 15.625 9.32274 15.625 8.98251V4.78762C15.2278 4.50523 14.9174 4.06932 14.7419 3.54752C14.5664 3.02572 14.5356 2.44718 14.6543 1.90163C14.773 1.35608 15.0346 0.874014 15.3984 0.530189C15.7623 0.186364 16.2081 0 16.6667 0C17.1253 0 17.5711 0.186364 17.9349 0.530189C18.2988 0.874014 18.5603 1.35608 18.679 1.90163C18.7977 2.44718 18.7669 3.02572 18.5914 3.54752C18.4159 4.06932 18.1055 4.50523 17.7083 4.78762V8.98251C17.7083 10.0032 17.3791 10.9821 16.793 11.7038C16.207 12.4256 15.4121 12.831 14.5833 12.831H10.4167V18.3088C10.8138 18.5911 11.1242 19.0271 11.2997 19.5489C11.4753 20.0707 11.506 20.6492 11.3873 21.1947C11.2686 21.7403 11.0071 22.2224 10.6433 22.5662C10.2794 22.91 9.83361 23.0964 9.375 23.0964C8.91639 23.0964 8.47059 22.91 8.10675 22.5662C7.7429 22.2224 7.48135 21.7403 7.36265 21.1947C7.24396 20.6492 7.27475 20.0707 7.45025 19.5489C7.62575 19.0271 7.93616 18.5911 8.33333 18.3088V12.831H3.125V18.3088C3.52217 18.5911 3.83258 19.0271 4.00808 19.5489C4.18359 20.0707 4.21438 20.6492 4.09568 21.1947C3.97698 21.7403 3.71543 22.2224 3.35159 22.5662C2.98774 22.91 2.54195 23.0964 2.08333 23.0964C1.62472 23.0964 1.17892 22.91 0.815081 22.5662C0.451239 22.2224 0.189686 21.7403 0.0709886 21.1947C-0.0477092 20.6492 -0.0169185 20.0707 0.158585 19.5489C0.334089 19.0271 0.644497 18.5911 1.04167 18.3088V4.78762C0.644497 4.50523 0.334089 4.06932 0.158585 3.54752C-0.0169185 3.02572 -0.0477092 2.44718 0.0709886 1.90163C0.189686 1.35608 0.451239 0.874014 0.815081 0.530189C1.17892 0.186364 1.62472 0 2.08333 0C2.54195 0 2.98774 0.186364 3.35159 0.530189C3.71543 0.874014 3.97698 1.35608 4.09568 1.90163C4.21438 2.44718 4.18359 3.02572 4.00808 3.54752C3.83258 4.06932 3.52217 4.50523 3.125 4.78762V10.2653Z" fill="#262564"/>
                                    </svg>
                                </div>
                                <p class="serviceItem text-left d-none d-md-block">Transmission</p>
                                <p class="sml-text d-inline">{{$post->transition ?? "NOT SUPPLIED"}}</p>
                            </div>
                            <hr class="d-md-none d-block serviceItemSeperator">
                        </div>
                        <div class="col-md-1 col-6">
                            <div class="serviceItemBox">
                                <div class="svgImg d-md-none d-inline">
                                    <svg width="15" height="auto" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.04167 7.69707H17.7083V10.2628H1.04167V7.69707ZM3.125 12.187C3.125 11.8278 3.35417 11.5456 3.64583 11.5456H5.72917C5.8673 11.5456 5.99978 11.6132 6.09745 11.7335C6.19513 11.8538 6.25 12.0169 6.25 12.187C6.25 12.3571 6.19513 12.5203 6.09745 12.6406C5.99978 12.7609 5.8673 12.8285 5.72917 12.8285H3.64583C3.5077 12.8285 3.37522 12.7609 3.27755 12.6406C3.17987 12.5203 3.125 12.3571 3.125 12.187ZM14.5833 1.5779L18.75 8.08192V11.5584C18.75 11.5584 16.0937 12.1485 15 13.8547C13.7917 15.5609 13.75 17.7033 13.75 17.7033C13.5833 18.6013 13.6042 19.2427 12.9479 19.2427H2.63542C1.97917 19.2427 1.80208 18.5628 1.4375 17.6648C1.4375 17.6648 0 13.2261 0 8.77466V1.5779C0 0.769707 0.552083 0.128284 1.20833 0H12.8333C13.4896 0 14.0312 0.513138 14.5833 1.5779ZM2.08333 2.56569V8.77466C2.08333 10.4552 2.32292 12.9311 2.70833 14.5475C2.89088 15.2734 3.11005 15.9847 3.36458 16.677H11.8021C11.8437 16.4461 11.9062 16.2023 11.9792 15.9329C12.2708 14.9451 12.2708 13.8547 13.375 12.264C14.0225 11.311 14.8433 10.5594 15.7708 10.0703C16.0833 9.89074 16.3854 9.73679 16.6771 9.60851V8.97992L12.9583 3.16863L12.8437 2.9762C12.7714 2.83706 12.6913 2.70418 12.6042 2.57852H2.08333V2.56569Z" fill="#262564"/>
                                    </svg>
                                </div>
                                <p class="serviceItem text-left d-none d-md-block">Doors</p>
                                <p class="sml-text d-inline">{{$post->doors ?? "NOT SUPPLIED"}}</p>
                            </div>
                            <hr class="d-md-none d-block serviceItemSeperator">
                        </div>
                        <div class="col-md-1 col-6">
                            <div class="serviceItemBox">
                                <div class="svgImg d-md-none d-inline">
                                    <svg width="15" height="auto" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.25 16.7917H9.5V2.20833H3.25V16.7917ZM11.5833 8.45833H14.7083C14.9846 8.45833 15.2496 8.56808 15.4449 8.76343C15.6403 8.95878 15.75 9.22373 15.75 9.5V15.75C15.75 15.8881 15.8049 16.0206 15.9025 16.1183C16.0002 16.216 16.1327 16.2708 16.2708 16.2708C16.409 16.2708 16.5414 16.216 16.6391 16.1183C16.7368 16.0206 16.7917 15.8881 16.7917 15.75V4.75L14.8958 2.85417C14.7011 2.65802 14.5922 2.39253 14.5932 2.11611C14.5941 1.83969 14.7049 1.57498 14.901 1.38021C15.0972 1.18544 15.3627 1.07657 15.6391 1.07755C15.9155 1.07852 16.1802 1.18927 16.375 1.38542L18.5625 3.57292C18.6609 3.66939 18.7392 3.78444 18.7929 3.91139C18.8465 4.03834 18.8744 4.17468 18.875 4.3125V15.75C18.875 16.4407 18.6006 17.103 18.1123 17.5914C17.6239 18.0798 16.9615 18.3542 16.2708 18.3542C15.5802 18.3542 14.9178 18.0798 14.4294 17.5914C13.941 17.103 13.6667 16.4407 13.6667 15.75V10.5417H11.5833V15.7708C12.1771 15.875 12.625 16.3854 12.625 17V17.625C12.625 18.3125 12.0625 18.875 11.375 18.875H1.375C1.21085 18.875 1.0483 18.8427 0.896646 18.7798C0.744989 18.717 0.60719 18.625 0.491117 18.5089C0.256696 18.2745 0.125 17.9565 0.125 17.625V17C0.125 16.375 0.572917 15.8646 1.16667 15.7708V1.375C1.16667 0.6875 1.75 0.125 2.46875 0.125H10.2812C11 0.125 11.5833 0.6875 11.5833 1.375V8.45833ZM5.33333 3.25H7.41667C7.69293 3.25 7.95789 3.35975 8.15324 3.5551C8.34859 3.75045 8.45833 4.0154 8.45833 4.29167V8.45833C8.45833 8.7346 8.34859 8.99955 8.15324 9.1949C7.95789 9.39025 7.69293 9.5 7.41667 9.5H5.33333C5.05707 9.5 4.79211 9.39025 4.59676 9.1949C4.40141 8.99955 4.29167 8.7346 4.29167 8.45833V4.29167C4.29167 4.0154 4.40141 3.75045 4.59676 3.5551C4.79211 3.35975 5.05707 3.25 5.33333 3.25Z" fill="#262564"/>
                                    </svg>
                                </div>
                                <p class="serviceItem text-left d-none d-md-block">Fuel Type</p>
                                <p class="sml-text d-inline">{{$post->fuelType->name ?? "NOT SUPPLIED"}}</p>
                            </div>
                            <hr class="d-md-none d-block serviceItemSeperator">
                        </div>
                        <div class="col-md-1 col-6">
                            <div class="serviceItemBox">
                                <div class="svgImg d-md-none d-inline">
                                    <svg width="15" height="auto" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.2085 9.58334H2.16683V10.625C2.16683 10.9013 2.05708 11.1662 1.86173 11.3616C1.66638 11.5569 1.40143 11.6667 1.12516 11.6667C0.848896 11.6667 0.583944 11.5569 0.388593 11.3616C0.193243 11.1662 0.0834961 10.9013 0.0834961 10.625V6.45834C0.0834961 6.18207 0.193243 5.91712 0.388593 5.72177C0.583944 5.52642 0.848896 5.41667 1.12516 5.41667C1.40143 5.41667 1.66638 5.52642 1.86173 5.72177C2.05708 5.91712 2.16683 6.18207 2.16683 6.45834V7.5H3.2085V5.41667H4.25016L6.021 3.64584C6.11747 3.54741 6.23252 3.46911 6.35947 3.41547C6.48642 3.36182 6.62276 3.33391 6.76058 3.33334H9.4585V2.29167H8.41683C8.14056 2.29167 7.87561 2.18192 7.68026 1.98657C7.48491 1.79122 7.37516 1.52627 7.37516 1.25C7.37516 0.973735 7.48491 0.708784 7.68026 0.513433C7.87561 0.318083 8.14056 0.208336 8.41683 0.208336H12.5835C12.8598 0.208336 13.1247 0.318083 13.3201 0.513433C13.5154 0.708784 13.6252 0.973735 13.6252 1.25C13.6252 1.52627 13.5154 1.79122 13.3201 1.98657C13.1247 2.18192 12.8598 2.29167 12.5835 2.29167H11.5418V3.33334H13.3752C13.7634 3.33063 14.1447 3.43649 14.476 3.63895C14.8073 3.84141 15.0755 4.13243 15.2502 4.47917L16.7502 7.5H18.8335V6.45834H19.8752C19.8752 6.45834 20.9168 6.03125 20.9168 10.625C20.9168 14.7917 19.8752 14.7917 19.8752 14.7917H18.8335V12.7083H16.7502V13.75C16.7502 14.0263 16.6404 14.2912 16.4451 14.4866C16.2497 14.6819 15.9848 14.7917 15.7085 14.7917H8.41683C8.0934 14.7917 7.77442 14.7164 7.48514 14.5717C7.19585 14.4271 6.94422 14.2171 6.75016 13.9583L4.25016 10.625H3.2085V9.58334ZM5.29183 8.54167L8.41683 12.7083H14.6668V11.6667C14.6668 11.3904 14.7766 11.1255 14.9719 10.9301C15.1673 10.7347 15.4322 10.625 15.7085 10.625H18.8335V9.58334H16.1043C15.9091 9.58373 15.7177 9.52925 15.5519 9.42611C15.3862 9.32297 15.2527 9.17532 15.1668 9L13.3856 5.42709H7.2085L5.29183 7.3125V8.54167Z" fill="#262564"/>
                                    </svg>
                                </div>
                                <p class="serviceItem text-left d-none d-md-block">Engine</p>
                                <p class="sml-text d-inline">{{$post->engine ?? "NOT SUPPLIED"}}</p>
                            </div>
                            <hr class="d-md-none d-block serviceItemSeperator">
                        </div>
                        <div class="col-md-1 col-6">
                            <div class="serviceItemBox">
                                <div class="svgImg d-md-none d-inline">
                                    <svg width="15" height="auto" viewBox="0 0 15 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.5053 5.68751C11.4844 5.66667 10.4949 4.77084 10.1511 3.46876C9.74486 1.96876 10.3594 0.500008 11.5261 0.187508C12.6928 -0.124992 13.9636 0.833341 14.3594 2.34376C14.7344 3.75001 14.2136 5.13542 13.1928 5.55209V6.37501C13.8178 6.37501 14.3803 7.15626 14.3803 7.60417C14.3803 8.05209 14.3803 8.05209 14.3594 8.27084C14.0662 10.5418 13.8854 12.8258 13.8178 15.1146C13.8178 16.5729 13.6511 18.875 10.6928 18.875H1.35944C0.734444 18.6667 0.317778 18.25 0.109445 17.625C-0.0364815 16.5885 -0.0364815 15.5366 0.109445 14.5C0.317778 14.0833 1.35944 13.875 3.22403 13.875C6.03653 13.875 6.96361 15.125 8.20319 15.125C9.03653 15.125 9.45319 14.9167 9.45319 14.5V9.47917C9.45319 8.43751 10.0782 7.00001 11.3282 6.37501C11.4844 6.31251 11.8074 6.31251 12.2865 6.37501L12.4949 5.68751H12.5053Z" fill="#262564"/>
                                    </svg>
                                </div>
                                <p class="serviceItem text-left d-none d-md-block">Seats</p>
                                <p class="sml-text d-inline">{{$post->seats ?? "NOT SUPPLIED"}}</p>
                            </div>
                        </div>
                        <div class="col-md-1 col-6">
                            <div class="serviceItemBox">
                                <div class="svgImg d-md-none d-inline">
                                    <svg width="15" height="auto" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.4819 6.77083L20.8647 7.86458V16.6146C20.8647 16.9047 20.7495 17.1829 20.5444 17.388C20.3393 17.5931 20.0611 17.7083 19.771 17.7083H18.6772C18.3872 17.7083 18.109 17.5931 17.9038 17.388C17.6987 17.1829 17.5835 16.9047 17.5835 16.6146V15.5208H4.4585V16.6146C4.4585 16.9047 4.34326 17.1829 4.13814 17.388C3.93303 17.5931 3.65483 17.7083 3.36475 17.7083H2.271C1.98092 17.7083 1.70272 17.5931 1.4976 17.388C1.29248 17.1829 1.17725 16.9047 1.17725 16.6146V7.86458L1.56006 6.77083H1.17725C0.887165 6.77083 0.608966 6.6556 0.403848 6.45048C0.19873 6.24536 0.0834961 5.96716 0.0834961 5.67708C0.0834961 5.387 0.19873 5.1088 0.403848 4.90368C0.608966 4.69856 0.887165 4.58333 1.17725 4.58333H2.31475L3.45225 1.31302C3.56386 0.990084 3.77351 0.710055 4.05195 0.512016C4.33038 0.313976 4.66369 0.207809 5.00537 0.20833H17.0366C17.7585 0.20833 18.371 0.667705 18.5897 1.31302L19.7272 4.58333H20.8647C21.1548 4.58333 21.433 4.69856 21.6381 4.90368C21.8433 5.1088 21.9585 5.387 21.9585 5.67708C21.9585 5.96716 21.8433 6.24536 21.6381 6.45048C21.433 6.6556 21.1548 6.77083 20.8647 6.77083H20.4819ZM5.38818 2.39583L4.20693 5.79739H17.8241L16.6429 2.39583H5.38818ZM18.6772 13.3333V7.86458H3.36475V13.3333H18.6772ZM6.09912 12.2396C5.664 12.2396 5.2467 12.0667 4.93902 11.7591C4.63135 11.4514 4.4585 11.0341 4.4585 10.599C4.4585 10.1638 4.63135 9.74653 4.93902 9.43886C5.2467 9.13118 5.664 8.95833 6.09912 8.95833C6.53424 8.95833 6.95154 9.13118 7.25922 9.43886C7.56689 9.74653 7.73975 10.1638 7.73975 10.599C7.73975 11.0341 7.56689 11.4514 7.25922 11.7591C6.95154 12.0667 6.53424 12.2396 6.09912 12.2396ZM15.9429 12.2396C15.5077 12.2396 15.0904 12.0667 14.7828 11.7591C14.4751 11.4514 14.3022 11.0341 14.3022 10.599C14.3022 10.1638 14.4751 9.74653 14.7828 9.43886C15.0904 9.13118 15.5077 8.95833 15.9429 8.95833C16.378 8.95833 16.7953 9.13118 17.103 9.43886C17.4106 9.74653 17.5835 10.1638 17.5835 10.599C17.5835 11.0341 17.4106 11.4514 17.103 11.7591C16.7953 12.0667 16.378 12.2396 15.9429 12.2396Z" fill="#262564"/>
                                    </svg>
                                </div>
                                <p class="serviceItem text-left d-none d-md-block">Body Type</p>
                                <p class="sml-text d-inline">{{$post->type ?? "NOT SUPPLIED"}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-2 right-arrow"><i class="fas fa-angle-right"></i></div> -->
            </div>
        </div>
    </section>
    <div class="sep">
        <div class="separator"></div>
    </div>
    <section class="des-sec-single-veh">
        <div class="container container-fluid main">
            <div class="row content">
                <div class="col-lg-8 col-sm-8">

                    <section id="description">
                        <h1 class="postTitle">Description</h1>
                        <p>{{$post->post_desc}}</p>
                    </section>

                    @if($post->rrp)
                        @if(auth()->user()->id != $post->user->id)
                        <section id="motocheck">
                            <div class="tradecheck-veh" id="motorcheck">
                                <h1>Get a check on this vehicle</h1>
                                <div class="vehicle-histy-sec rounded">
                                    <p class="vehicle-histy-sec-heading">MotorChecking your Vehicle can Provide:</p>
                                    <ul class="checks-veh">
                                        <li><a href="#"><img src="{{ asset('images/check.png') }}">Finance Checks</a>
                                        </li>
                                        <li><a href="#"><img src="{{ asset('images/check.png') }}">Independent Valuation</a>
                                        </li>
                                        <li><a href="#"><img src="{{ asset('images/check.png') }}">Stolen Check</a></li>
                                        <li><a href="#"><img src="{{ asset('images/check.png') }}">Vehicle Identity
                                                Check</a>
                                        </li>
                                        <li><a href="#"><img src="{{ asset('images/check.png') }}">Write-off’s &
                                                Scrapped</a>
                                        </li>
                                        <li class="more-checks"><a href="#"><span class="num-check">+14</span> More
                                                Checks </a>
                                        </li>
                                    </ul>
                                    <h4 class="veh-his-check-tl">Vehicle History Check</h4>
                                    @if($message)
                                        <h5>{{$message}}</h5>
                                    @endif
                                    <div class="report-btn">
                                        <ul class="veh-btn-inner">
                                            <li>
                                                <button {{$disabled ? 'disabled' : ''}} type="button"
                                                        wire:click="motorCheck"
                                                        class="vw-report">Email Report To Me
                                                </button>
                                            </li>
                                            <li class="vw-rpt-text">Before you decide to buy a car, find out its <a
                                                    wire:click="motorCheck" class="hist-link">history</a>
                                                now...
                                            </li>
                                        </ul>
                                        <div class="img-checker">
                                            <img src="{{ asset('images/motorcheck.png') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        @endif
                    @endif

                    @if($post->location == true)
                        <section id="location">
                            <div class="trademap-sec mt-5">
                                <h1>Trader Location</h1>
                                <div id="map" class="rounded"></div>

                                <script>
                                    function initMap() {
                                        const myLatLng = {
                                            lat: {{$userProfile->lat ?? 0}},
                                            lng: {{$userProfile->lng ?? 0}}
                                        };
                                        const map = new google.maps.Map(document.getElementById("map"), {
                                            zoom: 15,
                                            center: myLatLng,
                                        });
                                        new google.maps.Marker({
                                            position: myLatLng,
                                            map,
                                            title: "Trader Location",
                                        });
                                    }


                                </script>
                            </div>
                        </section>
                    @endif

                    <section id="sharePost">
                        <div class="trademap-sec mt-5">
                            <h1>Share this post</h1>
                            <div class="sharethis-inline-share-buttons"></div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <section id="moreInfo">
                        <h1 class="more-det-title">More details about the vehicle</h1>
                        @if($post->rrp)
                            <div class="autotrader-RRP">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img
                                            src="https://d24hn10xm3omio.cloudfront.net/wp-content/uploads/2019/07/23104426/autotrader_uk_logo.png"
                                            class="img-fluid"/>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 text-center">
                                        Guide Retail Price: <span
                                            class="autotrader-RRP_price">£{{number_format($post->rrp, 2, '.', '')}}</span>
                                        <p class="autotrader-RRP_comment">This doesn't take into consideration any optional
                                            extras and upgrades fitted</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <td>Make</td>
                                <td>{{mb_strtoupper($post->make->name)}}</td>
                            </tr>
                            <tr>
                                <td>Model</td>
                                <td>{{mb_strtoupper($post->models->name)}}</td>
                            </tr>
                            <tr>
                                <td>Registration</td>
                                <td>{{mb_strtoupper($post->regno)}}</td>
                            </tr>
                            <tr>
                                <td>Year</td>
                                <td>{{$post->year}}</td>
                            </tr>
                            <tr>
                                <td>Previous Owners</td>
                                <td>{{$post->owners}}</td>
                            </tr>
                            <tr>
                                <td>Prep required:</td>
                                <td>£{{number_format($post->prep, 2, '.', '') ?? 0.00}}</td>
                            </tr>
                            <tr>
                                <td>MOT Expiry date:</td>
                                <td>{{$post->mot_expire ?? "Not Supplied"}}</td>
                            </tr>
                            <tr>
                                <td>Tyre Tread:</td>
                                <td>
                                    <table class="table table-hover">
                                        <tr>
                                            <td>{{$post->tread_1}}mm</td>
                                            <td>{{$post->tread_2}}mm</td>
                                        </tr>
                                        <tr>
                                            <td>{{$post->tread_3}}mm</td>
                                            <td>{{$post->tread_4}}mm</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </section>
                    <section id="features">
                        <div class="feat-sec mt-5">
                            <h1 class="more-det-title">Features</h1>
                            @if($post->dealer_history)
                                <button class="f-btn">Dealer History : {{$post->dealer_history}}</button>
                            @endif
                            @if($post->service_history)
                                <button class="f-btn">Service History : {{$post->service_history}}</button>
                            @endif
                            @if($post->keys)
                                <button class="f-btn">{{$post->keys}} Keys</button>
                            @endif
                            @if($post->v5)
                                <button class="f-btn">V5 : {{$post->v5}}</button>
                            @endif
                            @if($post->vehicle_status)
                                <button class="f-btn">Vehicle Status : {{$post->vehicle_status}}</button>
                            @endif

                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>

