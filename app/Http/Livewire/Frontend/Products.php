<?php

namespace App\Http\Livewire\Frontend;

use App\Cart;
use App\Models\Product;
use Livewire\Component;

class Products extends Component
{   

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
        return view('livewire.frontend.products', $data);
    }
}
