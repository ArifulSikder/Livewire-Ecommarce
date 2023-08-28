<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
class Category extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $guarded = [];

    
    public function getUploadUrlAttribute()
    {
        if ($this->thumbnail && Storage::disk('uploads')->exists($this->thumbnail)) {
            return Storage::disk('uploads')->url($this->thumbnail);
        }

        return asset('backend/images/noimage.png');
        
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
