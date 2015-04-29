<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//创建users表
		Schema::create('users', function($table)
		{
			$table->increments('id',true)->unique();
			$table->string('name', 25)->index();
			$table->string('email', 50);
			$table->string('password', 60);
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->string('remember_token',100);
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//删除users表
		Schema::drop('users');		//drop('users');
	}

}
