<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginChoiceComponent extends Component
{
    public $firstname, $lastname, $email;

    public function render()
    {
        return view('livewire.login-choice-component');
    }

    public function reg()
    {
        $validatedData = $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
        ]);
        return $this->redirect('/auth/register/' . $this->firstname . '/' . $this->lastname . '/' . $this->email);
    }
}
