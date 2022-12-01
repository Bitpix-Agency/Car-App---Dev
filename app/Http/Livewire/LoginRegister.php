<?php

namespace App\Http\Livewire;

use App\Models\PremiumInviteUser;
use App\Models\User;
use Livewire\Component;
use Hash;

class LoginRegister extends Component
{
    public $users, $email, $password, $name;
    public $registerForm = false;
    public $error = false;

    public function render()
    {
        return view('livewire.login-email');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (\Auth::attempt(array('email' => $this->email, 'password' => $this->password))) {
            $checkIfPremium = PremiumInviteUser::where('attached_user_id', auth()->user()->id)->first();
            if ($checkIfPremium) {
                auth()->loginUsingId($checkIfPremium->premium_user_id);
                return redirect()->to('/app/dashboard');
            }
            session()->flash('message', "You are Login successful.");
            return redirect()->to('/app/dashboard');
        } else {
            $this->error = 'email and password are wrong.';
            session()->flash('error', 'email and password are wrong.');
        }
    }
}
