<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Buat permission (opsional) 
        $permissions = ['edit arsip', 'hapus arsip', 'tambah arsip', 'import arsip', 'manajemen akun'];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Hubungkan permission ke admin
        $adminRole->givePermissionTo(Permission::all());
    }
}
