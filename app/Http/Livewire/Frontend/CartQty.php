<?php

namespace App\Http\Livewire\Frontend;

use App\Cart;
use Livewire\Component;

class CartQty extends Component
{
    
    public $count;
    protected $listeners =['count'];

    public function count(){
        $this->count = Cart::count();
    }

    public function render()
    {
        return view('livewire.frontend.cart-qty');
    }
}
