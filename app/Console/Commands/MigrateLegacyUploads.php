<?php

namespace App\Console\Commands;

use App\Models\actuality;
use App\Models\Partenaires;
use App\Models\projects;
use App\Support\ImageStorage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MigrateLegacyUploads extends Command
{
    protected $signature = 'uploads:migrate-legacy';

    protected $description = 'Déplace les images uploadées vers storage/app/public (ancien emplacement incorrect)';

    public function handle(): int
    {
        $legacyRoot = storage_path('app/private/public');

        if (! is_dir($legacyRoot)) {
            $this->info('Aucun fichier legacy à migrer.');

            return self::SUCCESS;
        }

        $files = File::allFiles($legacyRoot);
        $migrated = 0;

        foreach ($files as $file) {
            $relativePath = str_replace('\\', '/', substr($file->getPathname(), strlen($legacyRoot) + 1));
            ImageStorage::ensureOnPublicDisk($relativePath);
            $migrated++;
            $this->line("Migré : {$relativePath}");
        }

        foreach (projects::whereNotNull('image')->get() as $project) {
            ImageStorage::ensureOnPublicDisk($project->image);
        }

        foreach (Partenaires::whereNotNull('logo')->get() as $partenaire) {
            ImageStorage::ensureOnPublicDisk($partenaire->logo);
        }

        foreach (actuality::whereNotNull('image_path')->get() as $actu) {
            ImageStorage::ensureOnPublicDisk($actu->image_path);
        }

        $this->info("Terminé. {$migrated} fichier(s) traité(s).");

        return self::SUCCESS;
    }
}
