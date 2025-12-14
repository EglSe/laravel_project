<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Admin
        User::create([
            'name' => 'Adminas',
            'surname' => 'Administratorius',
            'email' => 'admin@test.lt',
            'password' => Hash::make('password'), // Slaptažodis: 'password'
            'role' => 'admin',
        ]);

        // 2. employee
        User::create([
            'name' => 'Darbuotojas',
            'surname' => 'Dirbantis',
            'email' => 'employee@test.lt',
            'password' => Hash::make('password'),
            'role' => 'employee',
        ]);

        // 3. client/student
        User::create([
            'name' => 'Vardenis',
            'surname' => 'Pavardenis',
            'email' => 'client@test.lt',
            'password' => Hash::make('password'),
            'role' => 'client',
        ]);
    }
}
