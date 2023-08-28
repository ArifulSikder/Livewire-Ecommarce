<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class HomeSlider extends Component
{
    public $sliders;
    public function render()
    {
        return view('livewire.frontend.home-slider');
    }
}
