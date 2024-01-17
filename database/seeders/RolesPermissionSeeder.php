<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesPermissionSeeder extends Seeder
{ use WithoutEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            'View the main dashboard',
            'View the admin dashboard',
            'Create participants',
            'Edit participants',
            'Delete participants',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web',
                'description' => $permission,
            ]);
        }

        // create roles and assign existing permissions
        $superAdminRole = Role::create([
            'name' => 'super_admin',
            'guard_name' => 'web',
            'description' => 'Super admin role',
        ]);
        $superAdminRole->syncPermissions(Permission::all());

        $adminRole = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
            'description' => 'Admin role',
        ]);
        $adminRole->syncPermissions([
            'View the admin dashboard',
            'Create participants',
            'Edit participants',
            'Delete participants',
        ]);

        $participantRole = Role::create([
            'name' => 'participant',
            'guard_name' => 'web',
            'description' => 'Participants role',
        ]);
        $participantRole->syncPermissions([
            'View the main dashboard',
        ]);
    }
}
