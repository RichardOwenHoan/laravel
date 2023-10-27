<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Test User 1',
            'email' => '123@mail.com',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'Test User 2',
            'email' => '1234@mail.com',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'Test User 3',
            'email' => '1235@mail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
