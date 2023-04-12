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
        Schema::create('taskjobs_items_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('taskjob_id');
            $table->string('id_trx');
            $table->string('id_produk');
            $table->string('keterangan');
            $table->date('date_in');
            $table->string('status');
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
        Schema::dropIfExists('taskjobs_items_history');
    }
};
