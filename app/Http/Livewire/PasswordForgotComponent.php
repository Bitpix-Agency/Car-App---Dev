<?php

namespace App\Http\Livewire;

use App\Mail\ForgotPassword;
use App\Models\User;
use Livewire\Component;

class PasswordForgotComponent extends Component
{
    public $email, $message;

    public function render()
    {
        return view('livewire.password-forgot-component');
    }

    public function sendpassword()
    {
        $validatedData = $this->validate([
            'email' => 'required|exists:users,email',
        ]);

        $bytes = random_bytes(4);
        $newPass = bin2hex($bytes);

        $user = User::where('email', $this->email)->first();
        $user->password = bcrypt($newPass);
        $user->save();

        \Mail::to($this->email)->send(new ForgotPassword($newPass));

        $this->message = "New Password Sent";
    }
}
