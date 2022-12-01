<?php

namespace App\Http\Livewire;

use App\Models\Upvote;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class LeadersComponent extends Component
{
    use WithPagination;

    public $primitive = 1;

    public function render()
    {
        $users = DB::table('upvotes')
            ->leftJoin('users', 'upvotes.to_user_id', '=', 'users.id')
            ->select('users.id', 'users.name', DB::raw('count(*) as total'))
            ->where('users.is_active', '=', true)
            ->groupBy('upvotes.to_user_id')
            ->orderBy('total', 'desc')
            ->paginate(10);

        return view('livewire.leaders-component',[
            'users' => $users
        ]);
    }
}
