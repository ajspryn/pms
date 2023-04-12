<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskjobs_detail_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('taskjob_id',15);
            $table->text('uraian_kerja');
            $table->string('gambar_bukti_kerja');
            $table->date('waktu_kerja');
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
        Schema::dropIfExists('taskjobs_detail_history');
    }
};
