<?php

namespace App\Http\Livewire\Backend\Setting;

use App\Models\Color;
use App\Models\Size;
use Livewire\Component;

class Varients extends Component
{
    public $editEnable = false;

    public function render()
    {
        $data['colors'] = Color::orderBy('name', 'asc')->paginate(5);
        $data['sizes'] = Size::orderBy('name', 'asc')->paginate(5);
        return view('livewire.backend.setting.varients', $data)->layout('backend.layouts.master');
    }
}
