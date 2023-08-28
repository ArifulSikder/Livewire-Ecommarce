<?php

namespace App\Http\Livewire\Frontend\Include;

use App\Models\Product;
use Livewire\Component;

class QuickShopModel extends Component
{
    public $listeners = ["openModal"];
    public $product;
    public function openModal(Product $product)
    {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.frontend.include.quick-shop-model')->extends('frontend.layouts.master_frontend')->section('quickModal');
    }
}
