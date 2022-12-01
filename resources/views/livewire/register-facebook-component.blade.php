<div>
    <div style="{{ $currentStep != 299 ? 'display: none;' : '' }}" id="step-299">
        <h3>Before You Start You Need The Following</h3>
        <p><i>(Don't Close The Tab Until You Have Completed)</i></p>
        <ul>
            <li>Debit or Credit Card Details</li>
            <li>Photo ID (Passport/Driving License) - <i>Saved To Your Computer</i></li>
            <li>Selfie Photo (Picture of yourself) - <i>Saved To Your Computer</i></li>
            <li>Trader Documents (Your Trader Documents) - <i>Saved To Your Computer - PDF</i></li>
        </ul>
        <div class="col-sm-6 col-lg-6">
            <button class="btn btn-primary nextBtn btn-lg pull-left" wire:click="start"
                    type="button">Get started!
            </button>
        </div>
    </div>
    {{--    details --}}
    <div style="{{ $currentStep != 1 ? 'display: none;' : '' }}" id="step-1">
        <span class="create-acc">Your Details</span>
        <div class="row mt-3">
            <div class="col-sm-6 col-lg-6">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" wire:model="firstname">
                    @error('firstname') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class=" col-sm-6 col-lg-6">
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" wire:model="lastname">
                    @error('lastname') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class=" col-sm-6 col-lg-6">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required wire:model="email">
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class=" col-sm-6 col-lg-6">
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" required wire:model="phone">
                    @error('phone') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-sm-6 col-lg-6">
                <div class="form-group">
                    <label for="companyname">Company Name</label>
                    <input type="text" class="form-control" id="companyname" name="companyname"
                           wire:model="companyName">
                    @error('companyName') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-sm-6 col-lg-6">
            </div>
            <div class="col-sm-6 col-lg-6">
                <button class="btn btn-primary nextBtn btn-lg pull-left" wire:click="firstStepSubmit"
                        type="button">Next
                </button>
            </div>
        </div>
    </div>
    {{--    Location    --}}
    <div style="{{ $currentStep != 99 ? 'display: none;' : '' }}" id="step-99">
        <span class="create-acc">Get Your Location</span>
        <div class="row mt-3">
            <div class="col-sm-12 col-lg-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="lat" name="lat" placeholder="latitude" disabled required
                           wire:model="lat">
                    @error('lat') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="lon" name="lon" placeholder="longitude" disabled
                           required
                           wire:model="lon">
                    @error('lat') <span class="error">{{ $message }}</span> @enderror

                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <button class="btn btn-secondary nextBtn btn-lg btn-block h-75 mt-0 " onclick="getLocation()"><i
                        class="fas fa-location-arrow"></i> Get My Location
                </button>
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                        wire:click="location">Next
                </button>
            </div>
        </div>
    </div>
    {{--    Password    --}}
    <div style="{{ $currentStep != 2 ? 'display: none;' : '' }}" id="step-2">
        <span class="create-acc">Create Your Password</span>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required
                                   wire:model="password">
                            @error('password') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class=" col-sm-6 col-lg-6">
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation" required wire:model="password_confirmation">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                        wire:click="secondStepSubmit">Next
                </button>
            </div>
        </div>
    </div>
    {{--    profile picture --}}
    <div style="{{ $currentStep != 3 ? 'display: none;' : '' }}" id="step-3">
        <span class="create-acc">Upload Profile Picture</span>
        <div class="icon-button-div form-dv">
            <div class="row align-items-center">
                <div class="col-sm-12 col-lg-12 form-reg-mthd">
                    <label for="photo"
                           class="btn btn-primary btn-dashed w-100 border border-secondary border-dashed bg-white text-muted p-5"/>Choose
                    an image</label>
                    <input id="photo" type="file" wire:model="photo">
                    @error('photo')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-sm-12 col-lg-12 form-reg-mthd">
                    <div class="img-prev mt-5">
                        @if ($photo)
                            <img src="{{ $photo->temporaryUrl() }}" class="img-fluid">
                        @endif
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="thirdStepSubmit"
                            type="button">Next
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--    terms and conditions    --}}
    <div style="{{ $currentStep != 4 ? 'display: none;' : '' }}" id="step-4">
        <span class="create-acc">Privacy Policy</span>
        <div class="row mt-3">
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="table-responsive table-div">
                        <table class="table-cls">
                            <tbody>
                            <tr>
                                <td>
                                    <div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h5>Privacy Policy for Trade to Trade Group Limited </h5>
                                                    <p>This privacy policy explains how our company, Trade to Trade Group Limited uses the personal data we collect from you when you use our website at https://www.trade-2-trade.co.uk/ and when you use our Trade 2 Trade Mobile App.  We are committed to protecting your data and this policy explains your rights and how we protect your rights in accordance with data protection law.  We do not transfer your data outside the UK.</p>
                                                    <p>This policy (together with our subscription terms and conditions) and any additional terms of use in the User Manual incorporated by reference into the subscription terms and conditions, together our Terms of Use) applies to your use of:</p>
                                                    <ul>
                                                        <li>Trade 2 Trade Mobile application software (App) available on our site OR hosted on https://www.trade-2-trade.co.uk, once you have downloaded or streamed a copy of the App onto your mobile telephone or handheld device (Device).</li>
                                                        <li>Any of the services accessible through the App (Services) that are available on the App Site or other sites of ours (Services Sites). This policy sets out the basis on which any personal data we collect from you, or that you provide to us, will be processed by us. This App is not intended for children and we do not knowingly collect data relating to children. Please read the following carefully to understand our practices regarding your personal data and how we will treat it.</li>
                                                    </ul>
                                                    <h6>Location Data</h6>
                                                    <ul>
                                                        <li>YES I consent to processing of my Location Data ([including details of my current location disclosed by [GPS technology OR [OTHER TECHNOLOGY]] so that location-enabled Services are activated [to [PURPOSE OF LOCATION-ENABLED SERVICES]]).</li>
                                                    </ul>

                                                    <h6>What data do we collect?</h6>
                                                    <p>We collect the following data:</p>
                                                    <ul>
                                                        <li>Personal identification information (Name, email address, phone number and delivery address)</li>
                                                        <li>Financial details (credit or debit card details)</li>
                                                        <li>Automated interactions through use of cookies.  Please see our Cookie Policy.</li>
                                                    </ul>

                                                    <h6>How do we collect your data?</h6>
                                                    <p>You directly provide us with most of the data we collect. We collect data and process data when you:</p>
                                                    <ul>
                                                        <li>Register online or on the Trade2Trade App.</li>
                                                        <li>Voluntarily complete a customer survey or provide feedback or contact us through the website, Trade2Trade App or via email.</li>
                                                        <li>Use or view our website via your browser’s cookies.</li>
                                                    </ul>

                                                    <p>We may also receive your data indirectly from the following sources:</p>

                                                    <h6>How will we use your data?</h6>
                                                    <p>We collect your data so that we can:</p>
                                                    <ul>
                                                        <li>Process your order and manage your account.</li>
                                                        <li>Email you with special offers on other products and services we think you might like.</li>
                                                        <li>For the running of our business, such as accounting and administration.</li>
                                                        <li>[Add how else your company uses data]</li>
                                                    </ul>

                                                    <p>If you agree, we will share your data with our partner companies so that they may offer you their products and services.</p>

                                                    <p>When we process your order, we may send your data to, and also use the resulting information from, credit reference agencies to prevent fraudulent purchases, to account to HMRC for VAT, in communications with professional advisers such as accountants, solicitors, auditors and insurers and other service advisers such as IT support.</p>

                                                    <h6>How do we store your data?</h6>
                                                    <p>We securely store your data on our Online cloud database. We have put in place adequate security precautions to prevent your data from being accidentally lost, stolen, used or accessed in any unauthorised way.  We limit access to your data to only those employees, agents and contractors who have a legitimate interest in processing your data for the purpose of conducting and managing our business and performing our contract with you. </p>
                                                    <p>We will keep your basic information such as contact details, identity, financial and transaction for six years for tax purposes.  Once this time period has expired, we will delete your data by removing it from our Stripe accounts and our databases.</p>

                                                    <h6>Marketing</h6>
                                                    <p>We would like to send you information about products of ours that we think you might like, as well as those of our partner companies.</p>
                                                    <p>If you have agreed to receive marketing, you may always opt out at a later date.</p>
                                                    <p>You have the right at any time to stop us from contacting you for marketing purposes or giving your data to our partner companies.</p>
                                                    <p>If you no longer wish to be contacted for marketing purposes, please unsubscribe from our mailing letters, you will then no longer be contacted</p>

                                                    <h6>What are your data protection rights?</h6>
                                                    <p>We would like to make sure you are fully aware of all of your data protection rights. Every website and App user is entitled to the following:</p>
                                                    <ul>
                                                        <li><strong>The right to access</strong> – You have the right to ask us for copies of your personal data. We may charge you a small fee for this service.</li>
                                                        <li><strong>The right to rectification</strong> – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request us to complete the information you believe is incomplete.</li>
                                                        <li><strong>The right to erasure</strong> – You have the right to request that we erase your personal data, under certain conditions.</li>
                                                        <li><strong>The right to restrict processing</strong> – You have the right to request that we restrict the processing of your personal data, under certain conditions.</li>
                                                        <li><strong>The right to object to processing</strong> – You have the right to object to us processing of your personal data, under certain conditions.</li>
                                                        <li><strong>The right to data portability</strong> – You have the right to request that we transfer the data that we have collected to another organisation, or directly to you, under certain conditions.</li>
                                                        <p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us at our email:</p>
                                                        <ul>
                                                            <li>Call us at: 0114 551 0804</li>
                                                            <li>Or write to us: Unit 12, Callywhite Lane, Dronfield, S18 2XP</li>
                                                        </ul>

                                                        <h6>Privacy policies of other websites</h6>
                                                        <p>Our website contains links to other websites. Our privacy policy applies only to our website, so if you click on a link to another website, you should read their privacy policy.</p>

                                                        <h6>Changes to our privacy policy</h6>
                                                        <p>We keep this privacy policy under regular review and places any updates on this web page. This privacy policy was last updated on 2 April 2021.</p>

                                                        <h6>How to contact us</h6>
                                                        <p>If you have any questions about our privacy policy, the data we hold on you, or you would like to exercise one of your data protection rights, please do not hesitate to contact us.</p>
                                                        <ul>
                                                            <li>Email us at: help@trade-2-trade.co.uk</li>
                                                            <li>Call us at: 0114 551 0804</li>
                                                            <li>Or write to us: Unit 12, Callywhite Lane, Dronfield, S18 2XP</li>
                                                        </ul>

                                                        <h6>How to contact the appropriate authority</h6>
                                                        <p>Should you wish to report a complaint or if you feel that we have not addressed your concern in a satisfactory manner, you may contact the Information Commissioner’s Office.</p>

                                                        <p>Address: </p>
                                                        <p>Information Commissioner's Office, Wycliffe House, Water Lane, Wilmslow, Cheshire, SK9 5AF</p>

                                                        <p>Tel: 0303 123 1113</p>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                        wire:click="forthStepSubmit">Accept
                </button>
            </div>
        </div>
    </div>
    <div style="{{ $currentStep != 5 ? 'display: none;' : '' }}" id="step-5">
        <span class="create-acc">Choose A Subscription Plan</span>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="row subscription-main-row">
                    @foreach($subscriptions as $subscription)
                        <label class="whatever" for="subId">
                            <input type="checkbox" name="subId" value="{{$subscription->id}}" id="subId"
                                   wire:model="subId" wire:click="fifthStepSubmit" hidden/>
                            @error('subId') <span class="error">{{ $message }}</span> @enderror
                            <div class="col-sm-12">
                                <div class="subscription-box">
                                    <div class="table-inner">
                                        <table>
                                            <tbody>
                                            <tr class="sub-tr">
                                                <td class="left-td">
                                                    <img src="{{ asset('images/trade-subscription') }}.png">
                                                </td>
                                                <td class="rgt-td">
                                                    <span
                                                        class="sub-price"> £{{number_format($subscription->price, 2, '.', '')}}</span><br>
                                                    <span class="sub-price-bottom-txt"> Auto renewing plan</span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="monthly-plan-text">Details need adding to DB somehow</div>
                                </div>
                                <div class="free-trail-cls">
                                    You will be billed after your 30 day free trial ends
                                </div>
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>
            {{--            <div class="col-md-12">--}}
            {{--                <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="fifthStepSubmit" type="button">--}}
            {{--                    Next--}}
            {{--                </button>--}}
            {{--            </div>--}}
        </div>
    </div>
    <div style="{{ $currentStep != 6 ? 'display: none;' : '' }}" id="step-6">
        <span class="create-acc">Subscription Payment</span>
        <div class="row mt-3">
            <div class="form-group">
                <label for="card-holder-name">Name On Card</label>
                <input type="text" class="form-control" id="card-holder-name" name="card-holder-name"
                       wire:model="cardName">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="form-group" style="width: 1000px">
                <label for="name">Card Details</label>
                <div wire:ignore id="card-element"></div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-6 offset-lg-6">
            <button wire:click="sixthStepSubmit" class="btn btn-primary nextBtn btn-lg pull-left" id="card-button"
                    data-secret="{{ $intent ?? null }}"
            >
                Pay
            </button>
        </div>
    </div>
    <div style="{{ $currentStep != 7 ? 'display: none;' : '' }}" id="step-7">
        <span class="create-acc">Subscription Payment</span>
        <div class="row mt-3">
            <label>Subscription : {{\App\Models\StripePayment::where('id',$subId)->first()->product_id ?? null}}</label>
        </div>
        <div class="row mt-3">
            <label>Subscription Cost :
                £{{\App\Models\StripePayment::where('id',$subId)->first()->price ?? null}}</label>
        </div>
        <div class="row mt-3">
            <label>Card Name: {{$cardName}}</label>
        </div>
        <div class="col-sm-6 col-lg-6 offset-lg-6">
{{--            @if($message)--}}
{{--                <h1>$message</h1>--}}
{{--            @endif--}}
            <button {{ $disabled ? 'disabled' : '' }} wire:loading wire:click="store"
                    class="btn btn-primary nextBtn btn-lg pull-left"
                    id="card-button">
                Confirm
            </button>
        </div>
    </div>
    <div style="{{ $currentStep != 8 ? 'display: none;' : '' }}" id="step-8">
        <h3 class="mb-0">Welcome {{$user->name ?? "No Name"}},</h3>
        <span class="create-acc">Verification Documents</span>
        <div class="icon-button-div form-dv">
            <div class="row align-items-center reg-verif">
                <div class="col-sm-12 col-lg-12 form-reg-mthd">
                    <div class="right-lets-head">
                        <p class="right-title"><strong>Right lets get you verified!</strong></p>
                        <p>The sooner everyone knows you’re a bonafide trader,<br>
                            the sooner you can use the fantastic palform to full effect!
                        </p>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-4 form-reg-mthd">
                    <label for="image-profile">Upload an ID</label>
                    <div class="fallback">
                        <input name="file" type="file" wire:model="photoId"/>
                    </div>
                    <div class="dz-message" data-dz-message>
                        <span>
                            <img src="{{ asset('images/upload.png') }}">
                        </span>
                    </div>
                    @error('photoId')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-sm-4 col-lg-4 form-reg-mthd">
                    <label for="image-profile">Upload a Selfie</label>

                    <div class="fallback">
                        <input name="file" type="file" wire:model="photoSelfie"/>
                    </div>
                    <div class="dz-message" data-dz-message>
                        <span>
                            <img src="{{ asset('images/upload.png') }}">
                        </span>
                    </div>
                    @error('photoSelfie')
                    <span class="error">{{ $message }}</span>
                    @enderror

                </div>
                <div class="col-sm-4 col-lg-4 form-reg-mthd">
                    <label for="image-profile">Upload a Document</label>

                    <div class="fallback">
                        <input name="file" type="file" wire:model="document"/>
                    </div>
                    <div class="dz-message" data-dz-message>
                        <span>
                            <img src="{{ asset('images/upload.png') }}">
                        </span>
                    </div>
                    @error('document')
                    <span class="error">{{ $message }}</span>
                    @enderror

                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-6">
                    <div class="form-group">
                        <button wire:click="eighthStepSubmit" class="btn btn-primary nextBtn btn-lg pull-left">
                            Confirm Documents
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="{{ $currentStep != 9 ? 'display: none;' : '' }}" id="step-9">
        <h3 class="mb-0">Account Pending</h3>
        <span class="create-acc">Thanks for registering</span>
        <div class="icon-button-div form-dv">
            <div class="row align-items-center reg-verif">
                <div class="col-sm-12 col-lg-12 form-reg-mthd">
                    <div class="right-lets-head">
                        <p class="right-title"><strong>We're verifying your documents.</strong></p>
                        <p>This can take upto 72 hours.
                        </p>
                    </div>
                    <button wire:click="submitForm" class="btn btn-primary nextBtn btn-lg pull-left">
                        Complete Registration
                    </button>
                </div>
            </div>
        </div>
    </div>


</div>
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{env('STRIPE_KEY')}}')
    const elements = stripe.elements()
    const cardElement = elements.create('card')

    cardElement.mount('#card-element')

    const cardHolderName = document.getElementById('card-holder-name')
    const cardButton = document.getElementById('card-button')
    const clientSecret = cardButton.dataset.secret

    cardButton.addEventListener('click', async (e) => {
        e.preventDefault()
        cardButton.disabled = true

        const {setupIntent, error} = await stripe.confirmCardSetup(
            cardButton.dataset.secret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: cardHolderName.value
                    },
                },
            })

        if (error) {
            cardButton.disabled = false
        } else {
        @this.token
            = setupIntent.payment_method
            console.log(setupIntent)
        }
        console.log(error, setupIntent)
    })
</script>
<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;
        window.livewire.emit('set:latitude-longitude', latitude, longitude)
    }
</script>
