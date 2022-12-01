<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class TradersComponent extends Component
{
    use WithPagination;

    public $name, $location;

    /**
     * @return Application|Factory|View
     */
    public function render()
    {
        $location = $this->location;
        $traders = User::query()->with('profile')->where('is_active', true);
        if ($this->name)
            $traders = $traders->where('name', 'like', '%' . $this->name . '%');

        if ($this->location)
            $traders = $traders->whereHas('profile', function ($q) use ($location) {
                $q->where('city', 'like', '%' . $location . '%');
            });

        $traders = $traders->orderByDesc('id')->paginate(9);

        return view('livewire.traders-component', [
            'traders' => $traders
        ]);
    }

    public function clear()
    {
        $this->name = '';
        $this->location = '';
    }
}
