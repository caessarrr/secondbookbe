<?php

// AdminSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Cek apakah admin sudah ada
        if (User::where('email', 'admin@example.com')->doesntExist()) {
            // Membuat data admin jika belum ada
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => 'password', // Tidak perlu menggunakan bcrypt di sini
            ]);

            // Mendapatkan role admin
            $adminRole = Role::where('role_name', 'admin')->first();

            // Menambahkan role admin ke user yang baru dibuat
            UserRole::create([
                'user_id' => $admin->id,
                'role_id' => $adminRole->id,
            ]);
        }
    }
}