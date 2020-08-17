<?php

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $admin = Role::create(['name' => 'Admin']);
        $writer = Role::create(['name' => 'Writer']);
        $user = Role::create(['name' => 'User']);
        
        Permission::create(['name' => 'create writer']);
        Permission::create(['name' => 'read writer']);
        Permission::create(['name' => 'update writer']);
        Permission::create(['name' => 'delete writer']);

        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'read user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'create artikel']);
        Permission::create(['name' => 'read artikel']);
        Permission::create(['name' => 'update artikel']);
        Permission::create(['name' => 'delete artikel']);

        Permission::create(['name' => 'create kategori']);
        Permission::create(['name' => 'read kategori']);
        Permission::create(['name' => 'update kategori']);
        Permission::create(['name' => 'delete kategori']);

        Permission::create(['name' => 'create setting']);
        Permission::create(['name' => 'read setting']);
        Permission::create(['name' => 'update setting']);
        Permission::create(['name' => 'delete setting']);

        Permission::create(['name' => 'comment']);
        Permission::create(['name' => 'like']);

        $admin->syncPermissions(Permission::all());
        $writer->syncPermissions([
            'create artikel',
            'read artikel',
            'update artikel',
            'delete artikel',
            'comment',
            'like'
        ]);
        $user->syncPermissions([
            'comment',
            'like'
        ]);

    }
}
