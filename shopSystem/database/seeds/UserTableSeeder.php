<?php

use App\User;
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
        User::create(
            [
                'name'     => 'admin',
                'role'     => 'admin',
                'verified'=>true,
            
                'email'    => 'admin@mail.com',
                'password' => bcrypt(1111),

            ]
        );

        // User::create(
        //     [
        //         'name'     => 'simple_user',
        //         'email'    => 'user@mail.com',
        //         'password' => bcrypt(1111),
        //     ]
        // );
    }
}
