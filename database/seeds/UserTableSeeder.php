<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User();
        $user->password = Hash::make('admin');
        $user->name = 'admin';
        $user->email = 'admin@satisfaction.com';
        $user->save();
    }
}
