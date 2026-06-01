<?php

namespace App\Models;

use App\Support\ImageStorage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class produits extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'produits';

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    protected function imageUrl(): Attribute
    {
        return Attribute::get(fn () => ImageStorage::url($this->image));
    }
}
