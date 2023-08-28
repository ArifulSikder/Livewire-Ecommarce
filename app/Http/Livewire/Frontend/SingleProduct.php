<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;

class SingleProduct extends Component
{
    public $slug;
    public $product;


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
