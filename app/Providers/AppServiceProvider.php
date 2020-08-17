<?php

namespace App\Providers;

use App\Models\Role;
use Ramsey\Uuid\Uuid;
use App\Models\Permission;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Role::retrieved(function (Role $role) {
            $role->incrementing = false;
        });

        Role::creating(function (Role $role) {
            $role->incrementing = false;
            $role->id = Uuid::uuid4()->toString();
        });

        Permission::retrieved(function (Permission $permission) {
            $permission->incrementing = false;
        });

        Permission::creating(function (Permission $permission) {
            $permission->incrementing = false;
            $permission->id = Uuid::uuid4()->toString();
        });
    }
}
