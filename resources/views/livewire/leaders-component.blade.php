<div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/app/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/app/traders">All Traders</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Leaderboard</li>
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
                    <h2 class="all-cars-cls">Trader Leaderboard</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="results-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col" class="d-none d-md-block border-0"></th>
                            <th scope="col" class="border-0">Name</th>
                            <th scope="col" class="d-none d-md-block border-0">Company</th>
                            <th scope="col" class="border-0">Upvotes</th>
                            <th scope="col" class="d-none d-md-block border-0">Rating</th>
{{--                            <th scope="col">Position</th>--}}
                        </tr>
                        </thead>
                        <tbody class="border-0">
                        @foreach($users as $user)
                            <tr class="py-5">
                                <th class="d-none d-md-block" style="text-align: left; vertical-align: middle;" scope="row">
                                    <img
                                        src="{{\App\Models\UserProfile::where('user_id', $user->id)->first()->profile_image ?? "/images/person.png"}}"
                                        onerror="this.onerror=null;this.src='/images/person.png';"
                                        class="img-rounded leader-img"/>
                                </th>
                                <td style="text-align: left; vertical-align: middle;"><a href="/app/trader/{{ $user->id }}">{{$user->name}}</a> </td>
                                <td class="d-none d-md-block" style="text-align: left; vertical-align: middle;">{{\App\Models\UserProfile::where('user_id', $user->id)->first()->job ?? "Not Supplied"}}</td>
                                <td style="text-align: left; vertical-align: middle;">{{$user->total}}</td>
                                <td class="d-none d-md-block" style="text-align: left; vertical-align: middle;">
                                    <ul class="list-inline font-sm text-orange mb-0">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if (floor(\App\Models\UserRating::where('to_user', $user->id)->avg('rating')) - $i >= 1)
                                                <i class="fas fa-star text-sm"> </i>
                                            @elseif (\App\Models\UserRating::where('to_user', $user->id)->avg('rating') - $i > 0)
                                                <i class="fas fa-star-half-alt text-sm"> </i>
                                            @else
                                                <i class="far fa-star text-sm"> </i>
                                            @endif
                                        @endfor
                                    </ul>
                                </td>
{{--                                <td style="text-align: left; vertical-align: middle;">--}}
{{--                                    <div class="numberCircle">{{$primitive++}}</div>--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <nav aria-label="...">
                            <ul class="pagination">
                                {{ $users->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
