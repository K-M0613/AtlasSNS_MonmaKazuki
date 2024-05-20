<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            ['username' => '門馬一樹',
             'mail' => 'monma0613@email.com',
             'password' => bcrypt('Monma0613')
            ]
        ]);
    }
}
