<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
          $table->bigIncrements('id');
          $table->string('name');
          $table->string('email')->unique();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password');
          //id_role -> 1:superAdmin 2:mod 3:club
          $table->integer('id_role')->default(1);
          $table->rememberToken();
          $table->timestamps();
          /*
          $table->foreign('id_role')
                ->references('id_role')->on('roles')
                ->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
