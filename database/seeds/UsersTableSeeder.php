<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@me.com',
            'password' => Hash::make('admin'),
            'role' => 'role_user'
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@me.com',
            'password' => Hash::make('user'),
            'role' => 'role_admin'
        ]);
    }
}
