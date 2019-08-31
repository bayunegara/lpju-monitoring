<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMonitorings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_monitorings', function (Blueprint $table) {
            $table->bigInteger('ID')->autoIncrement();
            $table->integer('ID_HARDWARE')->unsigned();
            $table->date('TANGGAL');
            $table->time('WAKTU');
            $table->double('TOTAL_DAYA');
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
        Schema::dropIfExists('table_monitorings');
    }
}
