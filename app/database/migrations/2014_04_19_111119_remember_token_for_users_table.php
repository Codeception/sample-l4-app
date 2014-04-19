<?php

use Illuminate\Database\Migrations\Migration;

class RememberTokenForUsersTable extends Migration {

	/**
	 * Add remember token for compatibility with Laravel 4.1.26+.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table)
		{
			$table->string('remember_token', 100)->nullable();
		});
	}

	/**
	 * Reverse the migration.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table)
		{
			$table->dropColumn('remember_token');
		});
	}

}
