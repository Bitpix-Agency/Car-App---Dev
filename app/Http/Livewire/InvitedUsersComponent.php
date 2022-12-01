<?php

namespace App\Http\Livewire;

use App\Models\PremiumInviteUser;
use App\Models\User;
use Livewire\Component;

class InvitedUsersComponent extends Component
{
    public $invitedUsers;

    public function render()
    {
        $this->invitedUsers = PremiumInviteUser::where('premium_user_id', auth()->user()->id)->get();
        return view('livewire.invited-users-component');
    }

    public function remove(int $id)
    {
        $premUser = PremiumInviteUser::where('id', $id)->firstOrFail();

        $user = User::where('id', $premUser->attached_user_id)->first();
        if ($user) {
            User::where('id', $premUser->premium_user_id)->first()->subscription('default')->decrementQuantity(1, env('STRIPE_EXTRA_USER'));
            $user->delete();
        }
        $premUser->delete();
    }
}
