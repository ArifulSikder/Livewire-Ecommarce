<?php

namespace App\Http\Livewire\Backend\Product;

use Livewire\Component;
use App\Models\Banner as ModelBanner;
use App\Models\Category;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Banner extends Component
{
    
    use WithPagination;
    use WithFileUploads;

    public $state = [];
    public $thumbnail;
    public $oldThumbnail;
    public $editEnable = false;
    public $banner;

    protected $listeners = ['confirmDelete'];
    protected $paginationTheme = 'bootstrap';

    public function addData()
    {
        $this->state = [];
        $this->editEnable = false;
        $this->emit('open-modal', 'form-modal');
    }

    public function create()
    {

        $state = array_merge($this->state, ['thumbnail' => $this->thumbnail]);

        $validateData = Validator::make($state, [
            'name' => 'required|string|max:100',
            'category_id' => 'required|integer',
            'highlight' => 'required|string|max:100',
            'photo_alt' => 'required|string|max:100',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ])->validate();

        $photoUrl = '';
        if ($this->thumbnail) {
            $photoUrl = $this->thumbnail->store('/', 'uploads');
        }

        $validateData['thumbnail'] = $photoUrl;
        $validateData['created_by'] = Auth::id();

        ModelBanner::create($validateData);

        $this->reset();
        $this->dispatchBrowserEvent('hide-form', ['message' => 'Banner created successfully']);
    }

    public function edit(ModelBanner $banner)
    {
        $this->reset();
        $this->state = $banner->toArray();
        $this->banner = $banner;
        $this->editEnable = true;
        $this->oldThumbnail = $banner->upload_url;
        $this->emit('open-modal', 'form-modal');
    }

    public function update()
    {
        $validateData = Validator::make($this->state, [
            'name' => 'required|string|max:100',
            'category_id' => 'required|integer',
            'highlight' => 'required|string|max:100',
            'photo_alt' => 'required|string|max:100',
        ])->validate();

        if ($this->thumbnail) {
            $validateDataWithImage = Validator::make(
                ['thumbnail' => $this->thumbnail],
                [
                    'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                ],
            )->validate();
            if ($this->banner->thumbnail) {
                Storage::disk('uploads')->delete($this->banner->thumbnail);
            }

            array_merge($validateData, $validateDataWithImage);
            $validateData['thumbnail'] = $this->thumbnail->store('/', 'uploads');
        }

        $validateData['created_by'] = Auth::id();

        $this->banner->update($validateData);
        $this->reset();
        $this->dispatchBrowserEvent('hide-form', ['message' => 'Banner Updated successfully']);
    }

    public function delete(ModelBanner $banner)
    {
        $this->banner = $banner;
        $this->emit('delete');
    }

    public function confirmDelete()
    {
        $this->banner->delete();
    }

    public function getBannersProperty()
    {

        return ModelBanner::latest()->paginate(5);
    }


    public function render()
    {
        $data['banners'] = $this->banners;
        $data['categories'] = Category::orderBy('name', 'ASC')->get();
        return view('livewire.backend.product.banner', $data)->layout('backend.layouts.master');
    }
}
