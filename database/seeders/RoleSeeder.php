<?php

// database/seeders/RoleSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create admin role
        Role::create([
            'role_name' => 'admin',
            'description' => 'Administrator',
        ]);

        // Create seller role
        Role::create([
            'role_name' => 'seller',
            'description' => 'Seller',
        ]);

        // Create customer role
        Role::create([
            'role_name' => 'customer',
            'description' => 'Customer',
        ]);
    }
}
