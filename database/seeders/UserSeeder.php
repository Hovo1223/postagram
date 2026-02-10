<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
         app()[PermissionRegistrar::class]->forgetCachedPermissions();

          Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

          Permission::create([
            'name' => 'menu',
            'guard_name' => 'web',
        ]);
    }
}
