<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Role = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
            
        ]);
        $Role = Role::create([
            'name' => 'Super Admin',
            'guard_name' => 'web',
            
        ]);
        $Role = Role::create([
            'name' => 'user1',
            'guard_name' => 'web',
            
        ]);
        $Role = Role::create([
            'name' => 'user2',
            'guard_name' => 'web',
            
        ]);
        $Role = Role::create([
            'name' => 'user3',
            'guard_name' => 'web',
            
        ]);
        $Role = Role::create([
            'name' => 'user4',
            'guard_name' => 'web',
            
        ]);
    }
}
