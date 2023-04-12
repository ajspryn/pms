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
        Schema::create('taskjobs_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ship_id');
            $table->string('uuid', 191);
            $table->string('unit_uuid', 191);
            $table->string('component_uuid', 191);
            $table->string('part_uuid', 191);
            $table->string('name');
            $table->text('deskripsi');
            $table->integer('running_hour');
            $table->integer('life_time');
            $table->integer('left_hour');
            $table->string('freq_interval_type');
            $table->string('freq_interval');
            $table->integer('interval_hour');
            $table->double('est_biaya');
            $table->string('kritikal');
            $table->string('start_job');
            $table->string('end_job');
            $table->date('due_date');
            $table->integer('id_user');
            $table->string('type_maintenance');
            $table->integer('workgroup_id');
            $table->string('reminder');
            $table->integer('approval_id');
            $table->string('maintenance_status');
            $table->string('pms_status');
            
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
        Schema::dropIfExists('taskjobs_history');
    }
};
