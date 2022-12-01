<?php

namespace App\Http\Livewire;

use App\Models\StripePayment;
use Livewire\Component;

class SubscriptionsComponent extends Component
{
    public $subscriptions;

    public function render()
    {
        $this->subscriptions = auth()->user()->subscription()->items;
        return view('livewire.subscriptions-component');
    }
}
