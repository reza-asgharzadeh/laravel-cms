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
            'name' => 'super-admin',
            'label' => 'مدیر کل'
        ]);

        $superAdmin->permissions()->sync(Permission::all());

        $user = Role::create([
           'name' => 'user',
           'label' => 'کاربر عادی'
        ]);

        $user->permissions()->sync([
            1,2,3,4,5,20,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,159,160
        ]);
    }
}
