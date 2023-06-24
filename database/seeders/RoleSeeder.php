<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'operador']);
        $role = Role::create(['name' => 'usuario']);


        Permission::create([
            'name' => 'manage services',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $role = Role::findByName('admin');
        $role->givePermissionTo('manage services');



        Permission::create([
            'name' => 'manage users',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $role = Role::findByName('admin');
        $role->givePermissionTo('manage users');

        $role = Role::findByName('operador');
        $role->givePermissionTo('manage users');

        $role = Role::findByName('usuario');
        $role->givePermissionTo('manage users');


        Permission::create([
            'name' => 'manage attendance',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $role = Role::findByName('admin');
        $role->givePermissionTo('manage attendance');

        $role = Role::findByName('operador');
        $role->givePermissionTo('manage attendance');

    }
}
