<?php

namespace App\Models;

use App\Support\ImageStorage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Galerie extends Model
{
    use HasFactory;

    protected $table = 'galeries';

    protected $fillable = [
        'title',
        'description',
        'cover_image',
    ];

    protected function imageUrl(): Attribute
    {
        return Attribute::get(fn () => ImageStorage::url($this->cover_image));
    }
}
