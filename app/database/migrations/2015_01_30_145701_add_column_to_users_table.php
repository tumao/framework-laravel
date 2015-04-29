<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			//name,real_name to user table
			$table->string('name',20)->after('id');
			$table->string('real_name',50)->after('email');
			$table->string('remember_token',60)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			//
			$table->dropColumn('name');
			$table->dropColumn('real_name');
			$table->dropColumn('remember_token');
		});
	}

}
