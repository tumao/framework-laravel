<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysConfigTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//create sys_config table
		Schema::create('sys_config', function($table){
			$table->string('name',50)->unique()->index();
			$table->string('value',200);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//drop table sys_config
		Schema::drop('sys_config');

	}

}
