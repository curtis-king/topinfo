<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesActuality extends Model
{
    use HasFactory;

    protected $table = 'images_actualities';

    protected $fillable = [
        'actuality_id',
        'image_path',
    ];
}
