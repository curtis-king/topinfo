<?php

namespace App\Models;

use App\Support\ImageStorage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class services extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'name',
        'description',
        'icon',
    ];

    protected function iconUrl(): Attribute
    {
        return Attribute::get(fn () => ImageStorage::url($this->icon));
    }

    public function projects(): HasMany
    {
        return $this->hasMany(projects::class, 'service_id');
    }
}
