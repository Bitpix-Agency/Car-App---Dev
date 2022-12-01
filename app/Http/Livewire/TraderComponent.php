<?php

namespace App\Http\Livewire;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\Upvote;
use App\Models\User;
use App\Models\UserRating;
use Carbon\Carbon;
use Livewire\Component;

class TraderComponent extends Component
{
    public $traderId, $voted = false, $votes, $message, $messageSent, $rating;

    public function mount($id)
    {
        $this->traderId = $id;
    }

    public function render()
    {
        $this->votes = Upvote::where('to_user_id', $this->traderId)->count();

        $this->rating = UserRating::where('to_user', $this->traderId)->avg('rating');

        return view('livewire.trader-component', [
            'trader' => User::where('id', $this->traderId)->with('profile', 'posts')->first(),
        ]);
    }

    public function upvote()
    {
        if (auth()->user()->voted()->where('to_user_id', $this->traderId)->whereBetween('created_at', array(Carbon::now()->subDays(1)->toDateTimeString(), Carbon::now()->toDateTimeString()))->count() > 0) {
            $this->voted = true;
            return;
        }

        Upvote::create([
            'to_user_id' => $this->traderId,
            'from_user_id' => auth()->user()->id,
        ]);

        $this->votes = Upvote::where('to_user_id', $this->traderId)->count();
    }


    public function message()
    {
        $conversation = Conversation::updateOrCreate(
            [
                'to_user' => $this->traderId,
                'from_user' => auth()->user()->id,
            ],
            [
                'to_user' => $this->traderId,
                'from_user' => auth()->user()->id,
                'status' => 1,
            ]);

        Message::create([
            'message' => $this->message,
            'is_seen' => false,
            'deleted_from_sender' => false,
            'deleted_from_receiver' => false,
            'user_id' => auth()->user()->id,
            'conversation_id' => $conversation->id,
        ]);

        $this->messageSent = "Message has been sent";

        $this->message = '';
    }
}
