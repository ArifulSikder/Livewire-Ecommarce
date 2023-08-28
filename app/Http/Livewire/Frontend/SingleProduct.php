<?php

namespace App\Http\Livewire\Frontend;

use App\Cart;
use App\Models\Product;
use Livewire\Component;

class SingleProduct extends Component
{
    public $slug;
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
    }
    public function openModal($product_id)
    {
        $this->emit('openQuickModal', $product_id);
    }
    public function hideModal($product_id)
    {
        $this->emit('hideQuickModal', $product_id);
    }
 

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $this->product = Product::where('slug', $this->slug)->first();
        return view('livewire.frontend.single-product');
    }
}
