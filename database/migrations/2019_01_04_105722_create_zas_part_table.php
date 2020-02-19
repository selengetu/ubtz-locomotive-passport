<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZasPartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zas_part', function (Blueprint $table) {
            $table->increments('part_id');
            $table->integer('part_det_id');
            $table->integer('part_seri_id');
            $table->integer('part_num');
            $table->string('part_date');
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
        Schema::dropIfExists('zas_part');
    }
}
