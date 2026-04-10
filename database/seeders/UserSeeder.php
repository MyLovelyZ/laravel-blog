<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Muntazier Zahirudin',
            'username' => 'LovelyZ',
            'email' => 'LovelyZH@gmail.com',
            'password' => Hash::make('Admin#123'),
            'is_admin' => true
        ]);

        User::factory(9)->create();
    }
}
