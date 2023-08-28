<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Product;
use Livewire\Component;

class Details extends Component
{

    public $product;
    public function mount(Product $product)
    {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.backend.product.details')->layout('backend.layouts.master');
    }
}
