<?php

namespace App\Http\Livewire;

use http\Client\Curl\User;
use Livewire\Component;

class PasswordResetComponent extends Component
{
    public $password, $password_confirmation, $message;

    public function render()
    {
        return view('livewire.password-reset-component');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'password' => 'required|confirmed',
        ]);

        $user = auth()->user();
        $user->password = bcrypt($this->password);
        $user->save();

        $this->message = "Password updated";

        $this->password = '';
        $this->password_confirmation = '';
    }

}
