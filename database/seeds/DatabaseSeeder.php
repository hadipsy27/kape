<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->command->info('Users table seeded!');

		$this->call('ProjectsTableSeeder');
		$this->command->info('Projects table seeded!');

		$this->call('TasksTableSeeder');
		$this->command->info('Tasks table seeded!');

		$this->call('CoursesTableSeeder');
		$this->command->info('Courses table seeded!');

		$this->command->info('Selamat data telah ditambahkan yeeay!!!');

	}

}
