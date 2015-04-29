<?php 
class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create(array(
			'email' 		=> 'foo@bar.com',
			'name'			=> 'xiaofoo',
			'create_at'		=> '2015-01-15 00:00:00',
			'deleted_at'	=> '2015-01-15 00:00:00'
			));
	}
}

 ?>