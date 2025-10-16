<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // Create permissions
        Permission::create(['name' => 'banco_venezuela.conciliacion']);
        Permission::create(['name' => 'banco_bancamiga.reporte']);
        Permission::create(['name' => 'banco_tesoro.reporte']);
        Permission::create(['name' => 'banco_venezuela.reporte']);
        Permission::create(['name' => 'users.manage']);


        // Create a Super Admin role and assign all permissions
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $superAdminRole->givePermissionTo(Permission::all());

        // Find or create the admin user and assign the Super Admin role
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@conviasa.com'],
            [
                'name' => 'AdminConviasa',
                'password' => bcrypt('password') // Change this password in production
            ]
        );
        $adminUser->assignRole($superAdminRole);
    }
}
