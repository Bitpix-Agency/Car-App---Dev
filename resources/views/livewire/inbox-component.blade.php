<div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/app/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Inbox</li>
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
    <section class="inbox-sec">
        <div class="container">
            <div class="container-inner">
                <div class="messaging">
                    <div class="inbox_msg">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="inbox_people w-100">
                                    <div class="headind_srch d-none">
                                        <div class="srch_bar">
                                            <div class="stylish-input-group">
                                                <input type="text" class="search-bar" placeholder="Search Inbox"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inbox_chat">
                                        @foreach($conversations as $conversation)
                                            {{--                                        {{dd($conversation->messages)}}--}}
                                            <div class="chat_list">
                                                <div class="chat_people">
                                                    <div class="chat_img">
                                                        <img
                                                            src="https://ptetutorials.com/images/user-profile.png"
                                                            alt="tester"/>
                                                    </div>
                                                    @if($conversation->fromUser->id == auth()->user()->id)
                                                        <div class="chat_ib"
                                                             wire:click="getChat({{$conversation->toUser->id}}, {{$conversation->id}})">
                                                            <h5>{{ucfirst($conversation->toUser->name)}}
                                                                <span class="chat_date d-none">12 Jan 2021</span>
                                                            </h5>
                                                            <p>{{$conversation->messages->last()->message}}</p>
                                                        </div>
                                                    @else
                                                        <div class="chat_ib"
                                                             wire:click="getChat({{$conversation->fromUser->id}}, {{$conversation->id}})">
                                                            <h5>{{ucfirst($conversation->fromUser->name)}}<span
                                                                    class="chat_date d-none">12 Jan 2021</span></h5>
                                                            <p>{{$conversation->messages->last()->message}}</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8" style="{{ $fromUser == null ? 'display: none;' : '' }}">
                                <div class="chat_people-heads">
                                    <div class="chat-img">
                                        <img
                                            src="{{$fromUser->profile->profile_image ?? '/images/jsmith.png'}}"
                                            class="rounded-circle max-w-40px h-40px mr-2"/>
                                    </div>
                                    <div class="chat_head">
                                        <h5 class="box-head mt-1">
                                            <span class="box-hd-span">{{$fromUser->name ?? null}}</span>
                                            <span class="cht-box-span">{{$fromUser->profile->job ?? null}}</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="mesgs">
                                    <div class="msg_history">
                                        @if($messages != null)
                                            @foreach($messages as $message)
                                                <div
                                                    class=" {{$message->user_id == auth()->user()->id ? 'outgoing_msg' : 'incoming_msg' }}">
                                                    <div
                                                        class=" {{$message->user_id == auth()->user()->id ? 'sent_msg' : 'received_msg received_withd_msg' }}">
                                                        <span
                                                            class="time_date">{{$message->created_at->todatestring()}}</span>
                                                        <p>{{$message->message}}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="type_msg">
                                        <span class="error">{{ $errormessage }}</span>
                                        <div class="input_msg_write">
                                            <input id="writeMsg" type="text" class="write_msg" placeholder=""
                                                   wire:model="writeMsg"/>
                                            <button class="msg_send_btn" type="button" wire:click="sendMessage">
                                                Send
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
