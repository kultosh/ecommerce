<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('roles')->delete();

        \DB::table('roles')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Administrator',
                'created_at' => '2020-07-24 13:02:07',
                'updated_at' => '2020-07-24 13:02:07',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'user',
                'display_name' => 'Normal User',
                'created_at' => '2020-07-24 13:02:07',
                'updated_at' => '2020-07-24 13:02:07',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Seller',
                'display_name' => 'Seller',
                'created_at' => '2020-08-10 16:20:43',
                'updated_at' => '2020-08-10 16:20:43',
            ),
        ));


    }
}
