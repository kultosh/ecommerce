<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MallCart extends Component
{
    public $cartItems = [];

    protected $listeners = ['cartUpdate' => 'onUpdate', 'removeCart' => 'removeCart'];

    public function mount()
    {
        $this->cartItems = \Cart::session(auth()->id())->getContent()->toArray();
    }

    public function onUpdate()
    {
        // $this->cartItems = \Cart::session(auth()->id())->getContent()->toArray();
        $this->mount();
    }

    public function removeCart()
    {
        $this->mount();
    }

    public function removeFromCart($remitem)
    {
        \Cart::session(auth()->id())->remove($remitem);
        $this->emit('removeCart');
    }

    public function render()
    {
        return view('livewire.mall-cart');
    }
}
