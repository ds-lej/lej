<?php

use Illuminate\Database\Seeder;
use Lej\Entities\User as UserModel;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserModel::create([
            'name'     => 'Admin',
            'login'    => 'Admin',
            'email'    => 'admin@mail.loc',
            'password' => Hash::make('admin'),
        ]);
    }
}
