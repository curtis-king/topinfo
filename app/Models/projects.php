<?php

namespace App\Models;

use App\Support\ImageStorage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class projects extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'name',
        'description',
        'details',
        'image',
        'service_id',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(services::class, 'service_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ImagesProjects::class, 'project_id');
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::get(fn () => ImageStorage::url($this->image));
    }
}
