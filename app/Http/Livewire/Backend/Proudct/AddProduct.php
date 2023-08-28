<?php

namespace App\Http\Livewire\Backend\Proudct;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProduct extends Component
{
    use WithFileUploads;
    public $thumbnail;
    public $multiple_image = [];
    public $state = [];


    public function create()
    {
        $validateData = Validator::make($this->state, [
            'category_id' => 'required|integer',
            'name' => 'required|string|max:256',
            'slug' => 'required|string|max:256',
            'photo_alt' => 'required|string|max:256',
            'color_id' => 'required|integer',
            'size_id' => 'required|integer',
            'sales_price' => 'required|integer',
            'short_description' => 'required|string|max:500',
            'long_description' => 'required|string|max:1000',
            // 'multiple_image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ])->validate();

        $photoUrl = '';
        if ($this->thumbnail) {
            $photoUrl = $this->thumbnail->store('/', 'uploads');
        }
        $validateData['thumbnail'] = $photoUrl;

        foreach ($this->multiple_image as $key => $image) {
            $this->multiple_image[$key] = $image->store('/', 'uploads');
        }

        $validateData['multiple_image'] = json_encode($this->multiple_image);
        // $validateData['color_id'] = json_encode($validateData['color_id']);
        // $validateData['size_id'] = json_encode($validateData['size_id']);

        $product = Product::create($validateData);
        if ($product) {
            $this->reset();
            $this->emit('hide-form', ['message' => 'Product created successfully']);
            return redirect('products');
        }
        
    }
    public function render()
    {
        $data['categories'] = Category::orderBy('name', 'ASC')->get();
        return view('livewire.backend.proudct.add-product', $data)->layout('backend.layouts.master');
    }
}
