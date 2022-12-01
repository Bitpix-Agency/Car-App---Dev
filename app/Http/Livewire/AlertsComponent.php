<?php

namespace App\Http\Livewire;

use App\Models\Alert;
use Livewire\Component;

class AlertsComponent extends Component
{
    public $message = null;

    public function render()
    {
        return view('livewire.alerts-component', [
            'alerts' => Alert::with('make', 'models')->where('user_id', auth()->user()->id)->paginate(15)
        ]);
    }

    public function delete($alertId)
    {
        Alert::where('id', $alertId)->first()->delete();
        $this->message = "Deleted";
    }
}
