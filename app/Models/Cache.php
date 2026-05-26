<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cache extends Model
{
    use HasFactory;

    protected $table = 'cache';

    protected $fillable = [
        // Ajoute les colonnes de la table ici
    ];
}
