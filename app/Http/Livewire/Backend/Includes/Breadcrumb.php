<?php

namespace App\Http\Livewire\Backend\Includes;

use Livewire\Component;

class Breadcrumb extends Component
{
    public $data;
    public function render()
    {
        return view('livewire.backend.includes.breadcrumb');
    }
}
