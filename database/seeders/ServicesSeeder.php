<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\services;

class ServicesSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'Systèmes réseaux', 'description' => 'Conception, déploiement et administration de réseaux informatiques performants et sécurisés pour les entreprises et organisations.', 'icon' => null],
            ['name' => 'Maintenance informatique', 'description' => 'Maintenance préventive et corrective de votre parc informatique pour assurer votre continuité d\'activité sans interruption.', 'icon' => null],
            ['name' => 'Développement web', 'description' => 'Sites vitrines, applications web et plateformes sur mesure, modernes et responsives adaptées à vos besoins.', 'icon' => null],
            ['name' => 'Logiciel métier', 'description' => 'Solutions logicielles personnalisées adaptées à vos processus métier pour gagner en efficacité et en productivité.', 'icon' => null],
            ['name' => 'Sécurité & contrôle', 'description' => 'Vidéosurveillance, contrôle d\'accès et cybersécurité pour protéger vos locaux et vos données sensibles.', 'icon' => null],
            ['name' => 'Téléphonie IP', 'description' => 'Solutions de communication unifiée et téléphonie IP pour connecter vos équipes et réduire vos coûts.', 'icon' => null],
        ];

        foreach ($data as $item) {
            services::firstOrCreate(['name' => $item['name']], $item);
        }
    }
}
