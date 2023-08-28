<?php

namespace App\Http\Livewire\Frontend;

use App\Cart;
use App\Models\Product;
use Livewire\Component;

class AddToCart extends Component
{
    public $product;

    
    public $quantity = 1;

    public function decrease()
    {
        $this->quantity--;
    }
    public function increase()
    {
        $this->quantity++;
    }
    
    public function addToCart(Product $product)
    {
        
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $this->quantity,
            'price' => $product->sales_price,
            'thumbnail' => $product->thumbnail,
        ]);
        $this->quantity = 1;
        $this->emit('count');
        $this->emit('addToCart');
    }

    public function render()
    {
        return view('livewire.frontend.add-to-cart');
    }
}
