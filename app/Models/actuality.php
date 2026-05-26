<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class actuality extends Model
{
    //
    protected $table = 'actualities';

    protected $fillable = [
        'title',
        'content',
        'publication_date',
        'description',
    ];
}
