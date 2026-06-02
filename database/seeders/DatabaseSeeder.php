<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        $user = User::firstOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Test User', 'password' => bcrypt('password')]
        );
        $user->assignRole('super-admin');

        $this->call([
            ServicesSeeder::class,
            ProjectsSeeder::class,
            PartenairesSeeder::class,
            ActualitiesSeeder::class,
            ProduitsSeeder::class,
        ]);
    }
}
