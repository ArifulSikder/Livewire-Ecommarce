<?php

namespace App\Http\Livewire\Frontend\Include;

use App\Cart;
use Livewire\Component;

class CartSidebar extends Component
{
    public $contents = [];
    protected $listeners = ['cartContent'];
    public function cartContent()
    {
        $this->contents = Cart::content();
    }

    public function removeFromCart($product_id)
    {
        Cart::remove($product_id);
        $this->contents = Cart::content();
        $this->emit('count');
        $this->emit('myCart');
    }
    public function render()
    {
        return view('livewire.frontend.include.cart-sidebar');
    }
}
