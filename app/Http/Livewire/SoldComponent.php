<?php

namespace App\Http\Livewire;

use App\Mail\SoldMail;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class SoldComponent extends Component
{
    public $post, $searchTerm = "Enter User Name", $price, $userId, $message = null, $disabled = false, $checkBox = false;
    public $users;

    public function mount($id)
    {
        $this->post = Post::with('make', 'models', 'fuelType', 'user')->find($id);
    }

    public function render()
    {
        if ($this->post->user_id != auth()->user()->id) {
            $this->redirect('/app/dashboard');
        }

        if ($this->post->is_sold) {
            $this->disabled = true;
            $this->message = "Vehicle sold";
        }

        $searchTerm = '%' . $this->searchTerm . '%';
        $this->users = User::with('profile')->where('name', 'like', $searchTerm)->get();
        return view('livewire.sold-component');
    }

    public function submit()
    {
        $this->message = "Vehicle sold";
        $this->disabled = true;
        $postUser = $this->post->user;
        if ($this->checkBox) {
            $soldToUser = User::find($this->userId);

            Mail::to($soldToUser->email)
                ->queue(new SoldMail($soldToUser->id, $postUser->id, $this->post->id));
        }

        $this->post->is_sold = true;
        $this->post->save();
    }
}
