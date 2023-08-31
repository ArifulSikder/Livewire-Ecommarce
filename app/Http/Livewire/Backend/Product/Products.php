<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['confirmDelete'];
    public $product;

    public function delete(Product $product)
    {
        $this->product = $product;
        $this->emit('delete');
    }

    
    public function confirmDelete()
    {
        $this->product->delete();
    }
    public function render()
    {
        $data['products'] = Product::latest()->paginate(10);
        return view('livewire.backend.product.products', $data)->layout('backend.layouts.master');
    }
}
