<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Livewire\Component;

class Medicines extends Component
{
    public $count;
    public $loading = false;
    public $error = false;
    public $messageError;

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
                $this->error = true;
                $this->messageError = "Selecione a quantidade!";
                return;
            }

            Cart::create([
                'user_id' => auth()->user()->id,
                'medicine_id' => $id,
                'count' => $this->count,
            ]);

            session()->flash('status', 'Medicamento adicionado no carrinho!');

            $this->count = '';
        }catch(\Exception $e){
            $this->error = true;
            $this->messageError = $e->getMessage();
        }
    }
}
