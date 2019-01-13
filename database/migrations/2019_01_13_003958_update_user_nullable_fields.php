<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserNullableFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('yellow')->nullable()->change();
            $table->string('red')->nullable()->change();
            $table->string('green')->nullable()->change();
            $table->string('active_state')->nullable()->change();
            $table->string('avatar')->nullable()->change();
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
            $table->string('yellow')->nullable(false)->change();
            $table->string('red')->nullable(false)->change();
            $table->string('green')->nullable(false)->change();
            $table->string('active_state')->nullable(false)->change();
            $table->string('avatar')->nullable(false)->change();
        });
    }
}
