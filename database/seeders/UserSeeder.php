<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::query()->create([
            'name' => 'Super Admin',
            'email' => 'super@email.com',
            'password' => 123
        ]);

        $superAdmin->assignRole('Super Admin');

        $admin = User::query()->create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => 123
        ]);

        $admin->assignRole('Admin');

        $user = User::query()->create([
            'name' => 'Usuário',
            'email' => 'user@email.com',
            'password' => 123
        ]);

        $user->assignRole('User');

        $author = User::query()->create([
            'name' => 'Autor',
            'email' => 'autor@email.com',
            'password' => 123
        ]);

        $author->assignRole('Author');
    }
}
