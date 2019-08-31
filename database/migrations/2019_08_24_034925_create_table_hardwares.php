<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHardwares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_hardwares', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('SLUG')->unique();
            $table->integer('GSM_NUMBER')->nullable($value = false);
            $table->string('LABEL_HARDWARE');
            $table->char('CHAR_HARDWARE',1);
            $table->string('MAP_ADDRESS')->nullable();
            $table->double('MAP_LATITUDE')->nullable();
            $table->double('MAP_LONGITUDE')->nullable();
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
        Schema::dropIfExists('table_hardwares');
    }
}
