<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Permission = Permission::create([
            'name' => 'edit',
            'guard_name' => 'api',

        ]);
        $Permission = Permission::create([
            'name' => 'store',
            'guard_name' => 'api',

        ]);
        $Permission = Permission::create([
            'name' => 'get-all',
            'guard_name' => 'api',

        ]);
        $Permission = Permission::create([
            'name' => 'get',
            'guard_name' => 'api',

        ]);
        $Permission = Permission::create([
            'name' => 'update',
            'guard_name' => 'api',

        ]);
        $Permission = Permission::create([
            'name' => 'delete',
            'guard_name' => 'api',

        ]);
    }
}
