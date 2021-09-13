<?php

namespace App\Http\Livewire;

use App\Models\Medicine;
use Livewire\Component;

class Medicines extends Component
{
    public function render()
    {
        $medicines = Medicine::all();

        return view('livewire.medicines', [
            'medicines' => $medicines,
        ]);
    }
}
