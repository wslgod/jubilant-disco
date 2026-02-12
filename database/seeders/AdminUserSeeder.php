<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@boxoab.com'],
            [
                'name' => 'Administrador Box OAB',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'status' => true,
            ]
        );
    }
}
