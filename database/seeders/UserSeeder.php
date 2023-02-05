<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => "admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make(12345678),
            'nickname' => "admin",
            'phone_number' => '',
            'unit_id' => 1,
            'inventory_group_id' => 1,
            'isHead' => false,
            'isActive' => true
        ]);

        $user->assignRole('Inventory Member');
        $user->assignRole('Admin');
        
    }
}
