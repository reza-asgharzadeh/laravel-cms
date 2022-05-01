<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = Role::create([
            'name' => 'super-admin'
        ]);

        $superAdmin->permissions()->sync(Permission::all());

        $admin = Role::create([
            'name' => 'admin'
        ]);

        $admin->permissions()->sync(Permission::all());

        $user = Role::create([
           'name' => 'user'
        ]);

        $user->permissions()->sync([
            1,2,3,4,5,11,12,13,14,15,16,17,18,76,77,78
        ]);
    }
}
