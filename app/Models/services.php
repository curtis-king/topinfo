<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class services extends Model
{
        use HasFactory;

        protected $table = 'services';

        protected $fillable = [
            'name',
            'description',
            'icon',
        ];
    }


