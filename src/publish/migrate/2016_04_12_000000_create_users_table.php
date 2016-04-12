<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->string('email')->unique();
                $table->string('user_name')->unique();
                $table->string('password');
                $table->string('name');
                $table->string('mobile_no');
                $table->tinyInteger('allowed_gender');
                $table->tinyInteger('is_active');
                $table->rememberToken();
                $table->timestamps();
                $table->softDeletes();
            });
        } else {
            Schema::table('users', function ($table) {
                $table->string('user_name')->unique();
                $table->string('mobile_no');
                $table->tinyInteger('allowed_gender');
                $table->tinyInteger('is_active');
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}