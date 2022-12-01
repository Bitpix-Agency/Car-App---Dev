<?php

namespace App\Http\Livewire;

use App\Mail\InviteUser;
use App\Mail\SoldMail;
use App\Models\PremiumInviteUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class InviteUserComponent extends Component
{
    public $email, $name, $message = null;

    public function render()
    {
        return view('livewire.invite-user-component');
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'email' => 'required|email|unique:premium_invite_users,email',
            'name' => 'required|min:1',
        ]);

        $newInvite = new PremiumInviteUser();
        $newInvite->premium_user_id = \auth()->user()->id;
        $newInvite->fill($validatedData);
        $newInvite->save();

        Mail::to($this->email)
            ->queue(new InviteUser($newInvite));

        $this->message = "Invite Sent";
        $this->email = "";
        $this->name = "";
    }
}
