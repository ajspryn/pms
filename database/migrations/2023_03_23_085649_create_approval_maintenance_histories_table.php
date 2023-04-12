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
        Schema::create('approval_maintenance_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('taskjob_id');
            $table->integer('user_id');
            $table->string('is_approved', 191);
            $table->string('type_approve', 191);
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
        Schema::dropIfExists('approval_maintenance_history');
    }
};
