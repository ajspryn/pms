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
        Schema::create('crews', function (Blueprint $table) {
            $table->id();
            $table->string('ship_id');
            $table->string('user_id');
            $table->string('position_id');
            $table->string('pekerjaan')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('agama')->nullable();
            $table->string('negara')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('perkawinan')->nullable();
            $table->string('mulai_bekerja')->nullable();
            $table->string('akhir_bekerja')->nullable();
            $table->string('tinggi_badan')->nullable();
            $table->string('berat_badan')->nullable();
            $table->string('gol_darah')->nullable();
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
        Schema::dropIfExists('crews');
    }
};
