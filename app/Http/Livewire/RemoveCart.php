<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RemoveCart extends Component
{
    public $remitem = [];

    public function mount($remitem)
    {
        $this->remitem = $remitem;
    }

    public function removeFromCart()
    {
        \Cart::session(auth()->id())->remove($this->remitem['id']);
        $this->emit('removeCart');
    }

    public function render()
    {
        return view('livewire.remove-cart');
    }
}
