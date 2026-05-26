<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'name',
        'description',
        'details',
        'image',
        'service_id',
    ];
}
