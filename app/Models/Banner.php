<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    
    public function getUploadUrlAttribute()
    {
        if ($this->thumbnail && Storage::disk('uploads')->exists($this->thumbnail)) {
            return Storage::disk('uploads')->url($this->thumbnail);
        }

        return asset('backend/images/noimage.png');
        
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
