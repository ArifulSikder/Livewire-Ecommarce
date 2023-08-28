<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;
use App\Cart;

class Shop extends Component
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
    }
    public function openModal($product_id)
    {
        $this->emit('openQuickModal', $product_id);
    }
    public function hideModal($product_id)
    {
        $this->emit('hideQuickModal', $product_id);
    }

    public function render()
    {
        $data['products'] = Product::latest()->paginate(20);
        return view('livewire.frontend.shop', $data);
    }
}
