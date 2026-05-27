<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImagesActuality extends Model
{
    use HasFactory;

    protected $table = 'images_actualities';

    protected $fillable = [
        'actuality_id',
        'image_path',
    ];

    public function actuality(): BelongsTo
    {
        return $this->belongsTo(actuality::class, 'actuality_id');
    }
}
