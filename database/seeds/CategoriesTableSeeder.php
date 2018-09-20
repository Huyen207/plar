<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
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
    			'name'=>'iPhone',
    			'cate_slug'=>str_slug('iphone')
    		],
    		[
    			'name'=>'SamSung',
    			'cate_slug'=>str_slug('SamSung')
    		]

    	];
       DB::table('categories')->insert($data);
    }
}
