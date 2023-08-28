<?php

namespace App\Http\Livewire\Backend;

use App\Models\Category as ModelsCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Cviebrock\EloquentSluggable\Services\SlugService;

class Category extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $state = [];
    public $thumbnail;
    public $oldThumbnail;
    public $editEnable = false;
    public $category;

    protected $listeners = ['confirmDelete'];
    protected $paginationTheme = 'bootstrap';

    public function updatingState($value)
    {
        if (!empty($this->state) && $this->state['name']) {
            $slug = SlugService::createSlug(ModelsCategory::class, 'slug', $this->state['name']);
            $this->state['slug'] = $slug;
        }
    }
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
            'slug' => 'required|string|max:100',
        ])->validate();
        $validateData['created_by'] = Auth::id();

        ModelsCategory::create($validateData);

        $this->reset();
        $this->dispatchBrowserEvent('hide-form', ['message' => 'Category created successfully']);
    }

    public function edit(ModelsCategory $category)
    {
        $this->reset();
        $this->state = $category->toArray();
        $this->category = $category;
        $this->editEnable = true;
        $this->emit('open-modal', 'form-modal');
    }

    public function update()
    {
        $validateData = Validator::make($this->state, [
            'name' => 'required|string|max:100',
            'slug' => 'required|string|max:100',
        ])->validate();

  

        $validateData['created_by'] = Auth::id();

        $this->category->update($validateData);
        $this->reset();
        $this->dispatchBrowserEvent('hide-form', ['message' => 'Category Updated successfully']);
    }

    public function delete(ModelsCategory $category)
    {
        $this->category = $category;
        $this->emit('delete');
    }

    public function confirmDelete()
    {
        $this->category->delete();
    }

    public function getCategoriesProperty()
    {

        return ModelsCategory::latest()->paginate(5);
    }

    public function render()
    {
        $data['categories'] = $this->categories;
        return view('livewire.backend.category', $data)->layout('backend.layouts.master');
    }
}
