<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Medicine;
use Livewire\Component;

class Medicines extends Component
{
    public $count;
    public $loading = false;

    public function render()
    {
        $medicines = Medicine::all();

        return view('livewire.medicines', [
            'medicines' => $medicines,
        ]);
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

            $this->count = '';

            session()->flash('status', 'Medicamento adicionado no carrinho!');

        }catch(\Exception $e){
            session()->flash('error', 'Falha ao adicionar o medicamento no carrinho!');
        }
    }
}
