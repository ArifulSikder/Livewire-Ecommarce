<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;

    public $thumbnail;
    public $multiple_image = [];
    public $state = [];

    public $iteration = 0;

    public $product_id;
    public $product;
    public function mount($product_id)
    {
        $this->product_id = $product_id;
    }

    public function render()
    {
        $this->product = Product::findOrFail($this->product_id);
        $this->state = $this->product->toArray();
        $this->emit('selectPlease');
        $this->iteration++;
        $this->state['category_id'] = $this->product->category_id;
        
        $data['categories'] = Category::orderBy('name', 'ASC')->get();
        return view('livewire.backend.product.edit-product', $data)->layout('backend.layouts.master');
    }
}
