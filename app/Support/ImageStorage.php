<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageStorage
{
    public static function store(UploadedFile $file, string $directory): string
    {
        $extension = strtolower($file->getClientOriginalExtension() ?: $file->guessExtension() ?: 'jpg');
        $basename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        $filename = time().'_'.($basename ?: 'fichier').'.'.$extension;

        Storage::disk('public')->putFileAs($directory, $file, $filename);

        return $directory.'/'.$filename;
    }

    public static function delete(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    public static function url(?string $path): ?string
    {
        if (! $path) {
            return null;
        }

        self::ensureOnPublicDisk($path);

        if (! Storage::disk('public')->exists($path)) {
            return null;
        }

        $encoded = implode('/', array_map('rawurlencode', explode('/', $path)));

        return asset('storage/'.$encoded);
    }

    /**
     * Déplace les fichiers uploadés avant correction (disque local → public).
     */
    public static function ensureOnPublicDisk(string $path): void
    {
        if (Storage::disk('public')->exists($path)) {
            return;
        }

        $legacyFile = storage_path('app/private/public/'.$path);

        if (! is_file($legacyFile)) {
            return;
        }

        $directory = dirname($path);
        if ($directory !== '.') {
            Storage::disk('public')->makeDirectory($directory);
        }

        Storage::disk('public')->put($path, file_get_contents($legacyFile));
        @unlink($legacyFile);
    }
}
