<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesProjects extends Model
{
    use HasFactory;

    protected $table = 'images_projects';

    protected $fillable = [
        // À adapter selon la structure réelle de la table
        'project_id',
        'image_path',
    ];
}
