<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
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

    public function editForm()
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

        $product = $this->product->update($validateData);
        if ($product) {
            $this->emit('hide-form', ['message' => 'Product Updated successfully']);
            return redirect('/products');
        }
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
