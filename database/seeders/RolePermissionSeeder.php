<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Reinitialise role in cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = ['view', 'create', 'edit', 'delete'];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $roles = ['super_admin', 'admin', 'editor', 'contributor', 'reader'];
        foreach ($roles as $role) {
            $role = Role::create(['name' => $role]);

            if ($role->name == 'super_admin' || $role->name == 'admin') {
                $role->givePermissionTo($permissions);
            }

            if ($role->name == 'editor') {
                $role->givePermissionTo(['view', 'create', 'edit']);
            }

            if ($role->name == 'contributor') {
                $role->givePermissionTo(['view', 'create']);
            }

            if ($role->name == 'reader') {
                $role->givePermissionTo('view');
            }
        }
    }
}
