<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Eloquent::unguard();

		// $this->call('Menu_catelogueTableSeeder');
		// $this->command->info('this is usertableseeder');
		$this->call('Sys_configSeeder');
		$this->command->info('sys config table filled');
	}

}
