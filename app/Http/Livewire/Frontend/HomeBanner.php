<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Banner;
use Livewire\Component;

class HomeBanner extends Component
{
    public function render()
    {
        $data['banners'] = Banner::latest()->get();
        return view('livewire.frontend.home-banner', $data);
    }
}
