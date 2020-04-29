<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
          $table->increments('id_reservation');
          $table->unsignedBigInteger('id_user');
          $table->string('id_room');
          $table->DateTime('date_time_start');
          $table->dateTime('date_time_finish');
          $table->integer('is_approved')->default(0);
          $table->timestamps();
          //should be fixed
          $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
          $table->foreign('id_room')
                ->references('id_room')
                ->on('rooms')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
