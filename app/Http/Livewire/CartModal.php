<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartModal extends Component
{
    public $items;
    public $total;

    public function render()
    {
        return view('livewire.cart-modal');
    }
}
