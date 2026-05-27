<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImagesProjects extends Model
{
    use HasFactory;

    protected $table = 'images_projects';

    protected $fillable = [
        'project_id',
        'image_path',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(projects::class, 'project_id');
    }
}
