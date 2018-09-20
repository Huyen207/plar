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
        $data=[
        	[
        		'email'=>'huyen.pth207@gmail.com',
        		'password'=>bcrypt('123456'),
        		'level'=>'1'
        	],
        	[
        		'email'=>'huyen123@gmail.com',
        		'password'=>bcrypt('123456'),
        		'level'=>'1'
        	]
        ];
        DB::table('vp_users')->insert($data);
    }
}
