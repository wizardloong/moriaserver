<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role.index' => 'Просматривать список ролей',
            'role.create' => 'Создавать роли',
            'role.edit' => 'Редактировать роли',
            'role.delete' => 'Удалять роли',
            'user.index' => 'Просматривать список пользователей',
            'user.create' => 'Создавать пользователей',
            'user.edit' => 'Редактировать пользователей',
            'user.delete' => 'Удалять пользователей',
            'character.index' => 'Просматривать список персонажей',
            'character.create' => 'Создавать персонажей',
            'character.edit' => 'Редактировать персонажей',
            'character.delete' => 'Удалять персонажей',
        ];

        foreach ($permissions as $code => $name) {
            Permission::create(['name' => $name, 'code' => $code]);
        }
    }
}
