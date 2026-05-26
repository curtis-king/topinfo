<?php

namespace App\Models;

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
}
