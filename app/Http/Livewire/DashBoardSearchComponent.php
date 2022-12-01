<?php

namespace App\Http\Livewire;

use App\Models\Make;
use App\Models\Models;
use Livewire\Component;

class DashBoardSearchComponent extends Component
{
    public $makes, $models, $keyword;
    public $make, $model;

    public function render()
    {
        $this->makes = Make::orderBy('name')->get();
        $this->models = Models::inRandomOrder()->limit(50);
        if ($this->make)
            $this->models = Models::where('make_id', $this->make);

        $this->models = $this->models->orderBy('name')->get();
        return view('livewire.dash-board-search-component');
    }

    public function send()
    {
        $this->redirectRoute('posts', [
            'makeId' => $this->make,
            'modelId' => $this->model,
            'keyword' => $this->keyword,
        ]);
    }
}
