<?php

use Intervention\Image\Facades\Image;

if (!function_exists('uploadPlease')) {
    function uploadPlease($image)
    {

        $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save('public/uploads/' . $imageName);
        return $img_url = 'public/uploads/' . $imageName;
        
    }
}