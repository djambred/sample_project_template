<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            AdminUserSeeder::class,
            SeoSeeder::class,
            FooterLinkSeeder::class,
            JargonSeeder::class,
            PageConfigSeeder::class,
            LogoSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
