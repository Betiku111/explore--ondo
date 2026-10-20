<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'betikutaye@gmail'],
            [
                'name'     => 'Super Admin',
                'password' => Hash::make('Betiku@123'),
            ]
        );
    }
}