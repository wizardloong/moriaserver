<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class CreatePlayerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'Игрок',
            'code' => Role::PLAYER
        ]);

        $permissions = Permission::whereIn('code', [
            'character.index',
            'character.create',
            'character.edit',
            'character.delete',
        ])->get()->pluck('id','id');

        $role->permissions()->sync($permissions);

        foreach(User::where('email', '!=', env('ADMIN_EMAIL'))->get() as $user)
        {
            $user->roles()->sync([$role->id]);
        }
    }
}
