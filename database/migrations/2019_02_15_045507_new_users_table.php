<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
			$table->boolean('is_admin')->default(false);
            //
        });
		Schema::table('users', function (Blueprint $table) {
			$table->string('position')->default(false);
            //
        });
		Schema::table('users', function (Blueprint $table) {
			$table->string('department')->default(false);
            //
		});
		Schema::table('users', function (Blueprint $table) {
			$table->string('tel')->default(false);
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('is_admin');
            //
		});
		Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('position');
            //
		});
		Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('department');
            //
		});
		Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('tel');
            //
        });
    }
}
