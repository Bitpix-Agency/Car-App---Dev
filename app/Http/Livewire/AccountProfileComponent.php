<?php

namespace App\Http\Livewire;

use App\Models\Upvote;
use App\Models\User;
use App\Models\UserRating;
use Livewire\Component;

class AccountProfileComponent extends Component
{
    public $user, $rating, $upvotes;
    public function render()
    {
        $this->user = User::where('id', auth()->user()->id)->with('profile', 'posts')->first();
        $this->rating = UserRating::where('to_user', auth()->user()->id)->avg('rating');
        $this->upvotes = Upvote::where('to_user_id', auth()->user()->id)->count();
        return view('livewire.account-profile-component');
    }
}
