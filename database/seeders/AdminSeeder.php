<?php

// database/seeders/AdminSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat data admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Ganti 'password' dengan password yang diinginkan
        ]);

        // Membuat role admin jika belum ada
        $adminRole = Role::firstOrCreate(['role_name' => 'admin'], ['description' => 'Administrator']);

        // Menambahkan role admin ke user yang baru dibuat
        UserRole::create([
            'user_id' => $admin->id,
            'role_id' => $adminRole->id,
        ]);
    }
}
