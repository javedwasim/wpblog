<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
               'name'=>'John Deo',
               'email'=>'johndoe@test.com',
               'password'=>bcrypt('secret'),
            ],
            [
                'name'=>'Jane Deo',
                'email'=>'janedoe@test.com',
                'password'=>bcrypt('secret'),
            ],
            [
                'name'=>'Edo Masaru',
                'email'=>'edo@test.com',
                'password'=>bcrypt('secret'),
            ]
        ]);
    }
}
