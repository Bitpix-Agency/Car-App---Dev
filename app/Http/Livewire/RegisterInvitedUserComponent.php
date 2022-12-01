<?php

namespace App\Http\Livewire;

use App\Models\PremiumInviteUser;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;
use phpseclib3\Crypt\Hash;

class RegisterInvitedUserComponent extends Component
{
    public $email, $name, $invite, $number, $password, $password_confirm;

    public function mount($email)
    {
        $this->invite = PremiumInviteUser::where('email', $email)->with('premiumUser')->firstOrFail();
        $this->name = $this->invite->name;
    }

    public function render()
    {
        return view('livewire.register-invited-user-component');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'number' => 'required',
            'password' => 'required',
        ]);

        $newUser = new User();
        $newUser->name = $this->name;
        $newUser->password = bcrypt($this->password);
        $newUser->email = $this->email;
        $newUser->save();

        $this->invite->attached_user_id = $newUser->id;
        $this->invite->save();

        if (User::where('id', $this->invite->premium_user_id)->first()->subscribedToPlan(env('STRIPE_EXTRA_USER'), 'default')) {
            User::where('id', $this->invite->premium_user_id)->first()->subscription('default')->incrementQuantity(1, env('STRIPE_EXTRA_USER'));
        } else {
            User::where('id', $this->invite->premium_user_id)->first()->subscription('default')->addPlan(env('STRIPE_EXTRA_USER'));
        }

        return $this->redirect('/auth/login/email');
    }
}
