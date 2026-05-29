<?php

namespace App\Models;

use App\Support\ImageStorage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class actuality extends Model
{
    use HasFactory;

    protected $table = 'actualities';

    protected $fillable = [
        'title',
        'content',
        'publication_date',
        'description',
        'image_path',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(ImagesActuality::class, 'actuality_id');
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::get(fn () => ImageStorage::url($this->image_path));
    }
}
