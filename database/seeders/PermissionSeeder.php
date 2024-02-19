<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::query()->insert([
            [
                'name' => 'post_view',
                'label' => 'Ver Posts'
            ],
            [
                'name' => 'post_create',
                'label' => 'Cadastrar Posts'
            ],
            [
                'name' => 'post_update',
                'label' => 'Editar Posts'
            ],
            [
                'name' => 'post_delete',
                'label' => 'Excluir Posts'
            ],
            [
                'name' => 'user_view',
                'label' => 'Ver Usuários'
            ],
            [
                'name' => 'user_create',
                'label' => 'Cadastrar Usuários'
            ],
            [
                'name' => 'user_update',
                'label' => 'Editar Usuários'
            ],
            [
                'name' => 'user_delete',
                'label' => 'Excluir Uusários'
            ],
        ]);
    }
}
