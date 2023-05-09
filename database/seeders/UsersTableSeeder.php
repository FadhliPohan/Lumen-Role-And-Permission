<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = Users::create([
            'name' => 'Md.Meherul Islam',
            'email' => 'meherul@gmail.com',
            'password' => Hash::make('password')
        ]);
        $users = Users::create([
            'name' => 'muhammad Fadhli Dzil Ikram',
            'email' => 'fadly@mail.com',
            'password' => Hash::make('password')
        ]);
        $users = Users::create([
            'name' => 'user1',
            'email' => 'user1y@mail.com',
            'password' => Hash::make('password')
        ]);
        $users = Users::create([
            'name' => 'user2',
            'email' => 'user2@mail.com',
            'password' => Hash::make('password')
        ]);
        $users = Users::create([
            'name' => 'user3',
            'email' => 'user3@mail.com',
            'password' => Hash::make('password')
        ]);
        $users = Users::create([
            'name' => 'user4',
            'email' => 'user4@mail.com',
            'password' => Hash::make('password')
        ]);
    }
}
