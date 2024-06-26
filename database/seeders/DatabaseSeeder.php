<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use Database\Seeders\AdminSeeder;
use Database\Seeders\RoleSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
            // Tambahkan seeder lainnya di sini jika ada
        ]);
    }
}
