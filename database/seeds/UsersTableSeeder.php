<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'role_id' => NULL,
                'name' => 'Prasidha Tamang',
                'email' => 'admin2@admin.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$IbZroQom5d/e/16SOR4s0eQlVr46FOQxhZ9TaTvb21LLVtldwxBI2',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-06-30 14:13:26',
                'updated_at' => '2020-06-30 14:13:26',
            ),
            1 =>
            array (
                'id' => 2,
                'role_id' => 1,
                'name' => 'Santosh Tamang',
                'email' => 'admin@admin.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$coYf4YxYVoUCi6Y79p1ACufdJ4Xnc8vWThToDQVgVlDqjAaer.5La',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-06-29 11:52:17',
                'updated_at' => '2020-07-24 13:09:41',
            ),
            2 =>
            array (
                'id' => 3,
                'role_id' => 2,
                'name' => 'Customer',
                'email' => 'customer@customer.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$u0LP9dlJipIx1e4ZkVY4e.B6vF/bKwdT.1Bj5QLesmVKJb4Drgubq',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-08-10 16:00:46',
                'updated_at' => '2020-08-10 16:00:46',
            ),
        ));


    }
}
