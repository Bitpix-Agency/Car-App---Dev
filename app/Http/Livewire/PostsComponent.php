<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostsComponent extends Component
{
    public $posts;

    public function render()
    {
        $this->posts = Post::where('is_waiting', false)->orderBy('id', 'desc')->limit(5)->with('images', 'fuelType', 'models', 'make')->get();
        return view('livewire.posts-component');
    }
}
