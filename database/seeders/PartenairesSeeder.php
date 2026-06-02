<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\partenaires;

class PartenairesSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'TOTAL Congo', 'logo' => ''],
            ['name' => 'SNPC', 'logo' => ''],
            ['name' => 'Groupe Cofipa', 'logo' => ''],
            ['name' => 'Mairie de Brazzaville', 'logo' => ''],
            ['name' => 'Ministère de la Santé', 'logo' => ''],
            ['name' => 'Hôtel Olympic', 'logo' => ''],
            ['name' => 'MTN Congo', 'logo' => ''],
            ['name' => 'Airtel Congo', 'logo' => ''],
        ];

        foreach ($data as $item) {
            partenaires::firstOrCreate(['name' => $item['name']], $item);
        }
    }
}
