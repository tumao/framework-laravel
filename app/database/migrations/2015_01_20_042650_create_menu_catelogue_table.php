<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuCatelogueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//创建目录表
		Schema::create('menu_catelogue',function($table)
		{
			$table->increments('id',true)->unique();
			$table->string('name',50);
			$table->string('icon',50)->nullable();
			$table->integer('root');
			$table->integer('sort');
			$table->string('path',100);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//删除目录表
		Schema::drop('menu_catelogue');
	}

}
