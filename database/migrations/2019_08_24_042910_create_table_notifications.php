<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNotifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_notifications', function (Blueprint $table) {
            $table->bigInteger('ID')->autoIncrement();
            $table->integer('ID_HARDWARE')->unsigned();
            $table->string('NOTIF')->nullable();
            $table->char('STATUS',1);
            $table->timestamps();

            $table->foreign('ID_HARDWARE')->references('ID')->on('table_hardwares')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_notifications');
    }
}
