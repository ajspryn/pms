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
        Schema::create('taskjobs', function (Blueprint $table) {
            $table->string('taskjob_id',15)->primaryKey();
            $table->string('nama');
            $table->string('deskripsi');
            $table->integer('interval');
            $table->double('est_biaya');
            $table->string('kritikal',1);
            $table->date('start_job');
            $table->date('end_job');
            $table->date('due_date');
            $table->string('flag_schedule');
            $table->string('approval');
            $table->string('id_user');
            $table->string('id_kapal',1);
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
        Schema::dropIfExists('taskjobs');
    }
};
