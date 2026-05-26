<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partenaires extends Model
{
    use HasFactory;

    protected $table = 'partenaires';

    protected $fillable = [
        'name',
        'logo',
    ];
}

