<?php

namespace App\Models;

use App\Support\ImageStorage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partenaires extends Model
{
    use HasFactory;

    protected $table = 'partenaires';

    protected $fillable = [
        'name',
        'logo',
    ];

    protected function logoUrl(): Attribute
    {
        return Attribute::get(fn () => ImageStorage::url($this->logo));
    }
}
