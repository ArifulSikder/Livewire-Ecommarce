<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class CartIncrementDecrement extends Component
{
    
    public $quantity = 1;

    public function decrease()
    {
        $this->quantity--;
    }
    public function increase()
    {
        $this->quantity++;
    }
    
    public function render()
    {
        return view('livewire.frontend.cart-increment-decrement');
    }
}
