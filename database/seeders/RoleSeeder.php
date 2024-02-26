<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::query()->create([
            'name' => 'Super Admin'
        ]);

        $admin = Role::query()->create([
            'name' => 'Admin'
        ]);

        $admin->syncPermissions([
            'post_view', 
            'post_create', 
            'post_update', 
            'post_delete', 
            'user_view', 
            'user_create', 
            'user_update', 
            'user_delete'
        ]);

        $user = Role::query()->create([
            'name' => 'User'
        ]);

        $user->syncPermissions(['post_view']);

        $author = Role::query()->create([
            'name' => 'Author'
        ]);

        $author->syncPermissions([
            'post_view', 
            'post_create', 
            'post_update', 
            'post_delete'
        ]);
    }
}
