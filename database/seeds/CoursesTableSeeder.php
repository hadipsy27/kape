<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('courses')->truncate();
        DB::table('courses')->insert(
            array([
                'user_id'   => 1,
		    	'name' 		=> 'Makalah Pendidikan Pancasila',
		    	'group'	    => 3,
		    	'clas'	    => 5,
				'semester'	=> 4,
				'teacher'	=> $faker->name,
                ],
                [
                'user_id'   => 2,
                'name' 		=> 'Pemograman Web',
                'group'	    => 3,
                'clas'	    => 5,
                'semester'	=> 4,
                'teacher'	=> 'Irfan setiawan',
                ],
		    )
        );
    }
}
