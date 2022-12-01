<div>
    <div class="row mt-5 mb-5" id="account">
        <div class="col-md-12">
            <div class="bg-light-grey p-5 border-radius-20">
                <h5>Manage Your Subscription</h5>
                <div class="row mt-5">
                    <div class="col-md-4">
                        <div class="row">
                            @foreach($subscriptions as $subscription)
                                <label class="whatever" for="subId">
                                    <div class="col-sm-12">
                                        <div class="subscription-box selected">
                                            <div class="table-inner">
                                                <table>
                                                    <tbody>
                                                    <tr class="sub-tr">
                                                        <td class="left-td">
                                                            <img src="{{ asset('images/trade-subscription') }}.png">
                                                        </td>
                                                        <td class="rgt-td">
                                                            <span
                                                                class="sub-price"> £{{\App\Models\StripePayment::where('price_id', $subscription->stripe_plan)->first()->price}}</span><br>
                                                            <span
                                                                class="sub-price-bottom-txt"> Auto renewing plan
                                                                <span
                                                                    class="sub-price-bottom-txt"> QTY | {{$subscription->quantity}}
                                                                <span
                                                                    class="sub-price-bottom-txt"> {{\App\Models\StripePayment::where('price_id', $subscription->stripe_plan)->first()->name}}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="monthly-plan-text">With our monthly plan you can post vehicles
                                                to
                                                our network of verified traders, chat and call with traders, set alerts
                                                and
                                                search for the vehicles you require
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
