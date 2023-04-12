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
        Schema::create('approval_taskjobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('taskjob_id',15);
            $table->string('status_approval');
            $table->integer('orang_ke');
            $table->text('alasan')->nullable();
            $table->date('tgl_approval')->nullable();
            $table->string('id_user_approval',15);
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
        Schema::dropIfExists('approval_taskjobs');
    }
};
