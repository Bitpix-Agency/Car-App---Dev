<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use App\Models\UserRating;
use Livewire\Component;

class RatingComponent extends Component
{
    public $soldUser, $post, $rating = 1, $message = null, $disabled = false;

    public function mount($soldtoUserId, $postId)
    {
        $this->soldUser = User::find($soldtoUserId);
        $this->post = Post::with('user', 'make', 'models')->find($postId);
    }

    public function render()
    {
        if ($userRating = UserRating::where([
            'to_user' => $this->post->user->id,
            'from_user' => $this->soldUser->id,
        ])->first()
        ) {
            $this->message = "Rating has already been given";
            $this->disabled = true;
            $this->rating = $userRating->rating;
        }
        return view('livewire.rating-component');
    }

    public function submit()
    {
        $newRating = new UserRating();
        $newRating->to_user = $this->post->user->id;
        $newRating->from_user = $this->soldUser->id;
        $newRating->rating = $this->rating;
        $newRating->save();

        $this->message = "Rating Given Thank You For The Feedback";
        $this->disabled = true;
    }
}
