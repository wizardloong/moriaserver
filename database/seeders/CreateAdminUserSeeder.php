<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', env('ADMIN_EMAIL'))->first()
            ?? User::create([
                'name' => 'Wizard',
                'email' => env('ADMIN_EMAIL'),
                'password' => bcrypt('123456')
            ]);

        $role = Role::create([
            'name' => 'Администратор',
            'code' => Role::ADMINISTRATOR
        ]);

        $permissions = Permission::pluck('id','id')->all();

        $role->permissions()->sync($permissions);

        $user->roles()->sync([$role->id]);
    }
}
