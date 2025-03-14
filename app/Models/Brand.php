<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'slug'
    ];

    public function getLogoAttribute()
    {
        $path = 'images/brands/' . $this->attributes['logo'];
        if ($this->attributes['logo'] && Storage::disk('public')->exists($path)) {
            return asset('storage/' . $path);
        }
        return $this->attributes['logo'];
    }
}
