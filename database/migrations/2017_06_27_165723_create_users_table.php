<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('family');
            $table->string('username')->unique();
            $table->string('title');
            $table->string('des');
            $table->boolean('status');
            $table->integer('panel_id')->references('id')->on('panel')->onUpdate('cascade')->unsigned();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('api_token')->unique();
            $table->rememberToken();
            $table->string('created_date');
            $table->string('created_time');
            $table->string('updated_date');
            $table->string('updated_time');

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
        Schema::drop('users');
    }
}
