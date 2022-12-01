<?php

namespace App\Http\Livewire;

use App\Models\Feedback;
use Livewire\Component;

class FeedbackComponent extends Component
{
    public $feedback, $success;

    public function render()
    {
        return view('livewire.feedback-component');
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'feedback' => 'required|string',
        ]);

        $feedback = new Feedback();
        $feedback->user_id = auth()->user()->id;
        $feedback->feedback = $this->feedback;
        $feedback->save();

        $this->success = "Feedback Submitted";

        $this->feedback = '';

    }
}
