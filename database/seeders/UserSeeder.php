<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'Fahri',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Admin',
        ]);

        User::create([
            'username' => 'operator',
            'name' => 'Operator Sekolah',
            'email' => 'operator@sekolah.sch.id',
            'password' => Hash::make('password'),
            'role' => 'Operator',
        ]);
    }
}
