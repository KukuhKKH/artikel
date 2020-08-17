<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'username'  => 'admin',
            'password'  => 'secretservice',
            'name'      => 'Administrator',
            'email'     => 'admin@gmail.com'
        ]);
        $admin->assignRole('Admin');

        $writer = User::create([
            'username'  => 'writer',
            'password'  => 'secretservice',
            'name'      => 'Penulis Novel Cuy',
            'email'     => 'writer@gmail.com'
        ]);
        $writer->assignRole('Writer');
    }
}
