<?php

namespace App\Models;

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
}
