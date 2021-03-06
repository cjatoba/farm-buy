<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartComponent extends Component
{
    public $items;
    public $total;
    public $count = 0;

    protected $listeners = ['cartAdded' => 'mount'];

    public function mount(){
        $this->items = Cart::
                    where('user_id',auth()->user()->id)
                    ->join('medicines', 'carts.medicine_id', '=', 'medicines.id')
                    ->get();

        $this->count = Cart::where('user_id',auth()->user()->id)->count();

        $this->total = Cart::
        where('user_id',auth()->user()->id)
        ->join('medicines', 'carts.medicine_id', '=', 'medicines.id')
        ->sum('price');
    }

    public function cartModalShow(){
        $this->dispatchBrowserEvent('cart-modal-show');
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
