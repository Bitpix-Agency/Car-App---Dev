@extends('layout.app')
@section('title', 'Privacy Policy')
@section('content')
    <header class="vehicle-header-cls" style="">
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
    </header>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Legal</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="form-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="all-cars-cls">@yield('title')</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Privacy Policy for Trade to Trade Group Limited </h1>
                    <p>This privacy policy explains how our company, Trade to Trade Group Limited uses the personal data we collect from you when you use our website at https://www.trade-2-trade.co.uk/ and when you use our Trade 2 Trade Mobile App.  We are committed to protecting your data and this policy explains your rights and how we protect your rights in accordance with data protection law.  We do not transfer your data outside the UK.</p>
                    <p>This policy (together with our subscription terms and conditions) and any additional terms of use in the User Manual incorporated by reference into the subscription terms and conditions, together our Terms of Use) applies to your use of:</p>
                    <ul>
                        <li>Trade 2 Trade Mobile application software (App) available on our site OR hosted on https://www.trade-2-trade.co.uk, once you have downloaded or streamed a copy of the App onto your mobile telephone or handheld device (Device).</li>
                        <li>Any of the services accessible through the App (Services) that are available on the App Site or other sites of ours (Services Sites). This policy sets out the basis on which any personal data we collect from you, or that you provide to us, will be processed by us. This App is not intended for children and we do not knowingly collect data relating to children. Please read the following carefully to understand our practices regarding your personal data and how we will treat it.</li>
                    </ul>
                    <h3>Location Data</h3>
                    <ul>
                        <li>YES I consent to processing of my Location Data ([including details of my current location disclosed by [GPS technology OR [OTHER TECHNOLOGY]] so that location-enabled Services are activated [to [PURPOSE OF LOCATION-ENABLED SERVICES]]).</li>
                    </ul>

                    <h3>What data do we collect?</h3>
                    <p>We collect the following data:</p>
                    <ul>
                        <li>Personal identification information (Name, email address, phone number and delivery address)</li>
                        <li>Financial details (credit or debit card details)</li>
                        <li>Automated interactions through use of cookies.  Please see our Cookie Policy.</li>
                    </ul>

                    <h3>How do we collect your data?</h3>
                    <p>You directly provide us with most of the data we collect. We collect data and process data when you:</p>
                    <ul>
                        <li>Register online or on the Trade2Trade App.</li>
                        <li>Voluntarily complete a customer survey or provide feedback or contact us through the website, Trade2Trade App or via email.</li>
                        <li>Use or view our website via your browser’s cookies.</li>
                    </ul>

                    <p>We may also receive your data indirectly from the following sources:</p>

                    <h3>How will we use your data?</h3>
                    <p>We collect your data so that we can:</p>
                    <ul>
                        <li>Process your order and manage your account.</li>
                        <li>Email you with special offers on other products and services we think you might like.</li>
                        <li>For the running of our business, such as accounting and administration.</li>
                        <li>[Add how else your company uses data]</li>
                    </ul>

                    <p>If you agree, we will share your data with our partner companies so that they may offer you their products and services.</p>

                    <p>When we process your order, we may send your data to, and also use the resulting information from, credit reference agencies to prevent fraudulent purchases, to account to HMRC for VAT, in communications with professional advisers such as accountants, solicitors, auditors and insurers and other service advisers such as IT support.</p>

                    <h3>How do we store your data?</h3>
                    <p>We securely store your data on our Online cloud database. We have put in place adequate security precautions to prevent your data from being accidentally lost, stolen, used or accessed in any unauthorised way.  We limit access to your data to only those employees, agents and contractors who have a legitimate interest in processing your data for the purpose of conducting and managing our business and performing our contract with you. </p>
                    <p>We will keep your basic information such as contact details, identity, financial and transaction for six years for tax purposes.  Once this time period has expired, we will delete your data by removing it from our Stripe accounts and our databases.</p>

                    <h3>Marketing</h3>
                    <p>We would like to send you information about products of ours that we think you might like, as well as those of our partner companies.</p>
                    <p>If you have agreed to receive marketing, you may always opt out at a later date.</p>
                    <p>You have the right at any time to stop us from contacting you for marketing purposes or giving your data to our partner companies.</p>
                    <p>If you no longer wish to be contacted for marketing purposes, please unsubscribe from our mailing letters, you will then no longer be contacted</p>

                    <h3>What are your data protection rights?</h3>
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

                        <h3>Privacy policies of other websites</h3>
                        <p>Our website contains links to other websites. Our privacy policy applies only to our website, so if you click on a link to another website, you should read their privacy policy.</p>

                        <h3>Changes to our privacy policy</h3>
                        <p>We keep this privacy policy under regular review and places any updates on this web page. This privacy policy was last updated on 2 April 2021.</p>

                        <h3>How to contact us</h3>
                        <p>If you have any questions about our privacy policy, the data we hold on you, or you would like to exercise one of your data protection rights, please do not hesitate to contact us.</p>
                        <ul>
                            <li>Email us at: help@trade-2-trade.co.uk</li>
                            <li>Call us at: 0114 551 0804</li>
                            <li>Or write to us: Unit 12, Callywhite Lane, Dronfield, S18 2XP</li>
                        </ul>

                        <h3>How to contact the appropriate authority</h3>
                        <p>Should you wish to report a complaint or if you feel that we have not addressed your concern in a satisfactory manner, you may contact the Information Commissioner’s Office.</p>

                        <p>Address: </p>
                        <p>Information Commissioner's Office, Wycliffe House, Water Lane, Wilmslow, Cheshire, SK9 5AF</p>

                        <p>Tel: 0303 123 1113</p>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
