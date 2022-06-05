<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



//テストデータ入れて、POSTMANで確認してみる

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'test',
                'email' => 'test@test',
                'password' => bcrypt('testtest'),
            ],
            [
                'name' => 'test1',
                'email' => 'test1@test',
                'password' => bcrypt('password1'),
            ],
            [
                'name' => 'test2',
                'email' => 'test2@test',
                'password' => bcrypt('password2'),
            ],
            [
                'name' => 'test3',
                'email' => 'test3@test',
                'password' => bcrypt('password3'),
            ],
         ]);
    }
}
