<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id'        => 1,
            'name'      => 'Admin',
            'username'  => 'admin',
            'password'  => bcrypt('admin'),
            'role'      => 'ADMIN',
            'email'      => 'admin@admin.com',
        ]);

        User::create([
            'id'            => 2,
            'name'          => 'User',
            'username'      => 'user',
            'password'      => bcrypt('user'),
            'description'   => 'Accounting Staff',
            'role'          => 'USER',
            'email'      => 'user@user.com',
        ]);

        User::create([
            'id'            => 3,
            'name'          => 'Robby Novianto',
            'username'      => 'veez',
            'password'      => bcrypt('12345'),
            'description'   => 'WebDev',
            'role'          => 'USER',
            'email'      => 'heyitsrobby99@gmail.com',
        ]);
    }
}
