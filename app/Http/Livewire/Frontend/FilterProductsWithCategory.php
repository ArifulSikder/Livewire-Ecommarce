<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Category;
use Livewire\Component;

class FilterProductsWithCategory extends Component
{
    public function render()
    {
        $data['categories'] = Category::orderBy('name', 'asc')->get();

        return view('livewire.frontend.filter-products-with-category', $data);
    }
}
