<?php

namespace App\Http\Livewire;

use App\Models\Medicine;
use Livewire\Component;

class Dashboard extends Component
{
    public $medicines;

    public function mount(){
        $this->medicines = Medicine::all();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
