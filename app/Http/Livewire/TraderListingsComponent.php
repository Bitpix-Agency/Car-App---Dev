<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class TraderListingsComponent extends Component
{
    public function render()
    {
        return view('livewire.trader-listings-component', [
            'posts' => Post::where('user_id', auth()->user()->id)->where('is_waiting', false)->with('images', 'fuelType')->orderBy('id', 'desc')->get()
        ]);
    }
}
