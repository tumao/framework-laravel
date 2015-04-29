<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//创建permissions表
		Schema::create('permissions',function($table){
			$table->increments('id', true)->unique();
			$table->string('code', 50);
			$table->string('name', 50)->index();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//删除permissions表
		Schema::drop('permissions');
	}

}
