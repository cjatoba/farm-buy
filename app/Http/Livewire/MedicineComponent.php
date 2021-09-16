<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Medicine;
use Livewire\Component;
use Livewire\Livewire;

class MedicineComponent extends Component
{
    public $medicine;
    public $count;
    public $loading = false;

    public function render()
    {
        return view('livewire.medicine-component');
    }

    public function addCart($id){

        try{
            if(empty($this->count)){
                session()->flash('error', 'Selecione a quantidade do medicamento!');
                return;
            }

            Cart::create([
                'user_id' => auth()->user()->id,
                'medicine_id' => $id,
                'count' => $this->count,
            ]);

            $this->emitTo('cart-component', 'cartAdded');

            $this->count = '';

            session()->flash('success', 'Medicamento adicionado no carrinho!');

        }catch(\Exception $e){
            session()->flash('error', 'Falha ao adicionar o medicamento no carrinho!');
        }
    }
}
