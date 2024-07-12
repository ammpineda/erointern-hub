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

        User::create([
            'type' => 'admin',
            'email' => 'erovoutika@gmail.com',
            'first_name' => 'null',
            'last_name' => 'null',
            'username' => 'admin',
            'password' => 'Erovoutika@123',
        ]);
    }
}
