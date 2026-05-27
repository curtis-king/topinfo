<?php

namespace App\Models;

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
}
