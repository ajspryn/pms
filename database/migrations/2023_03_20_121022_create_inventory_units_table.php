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
        Schema::create('inventory_units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid', 191);
            $table->string('sub_group_id', 191);
            $table->string('code_units');
            $table->string('d_cu')->default('0');
            $table->string('item_code');
            $table->string('name');
            $table->string('list_no')->nullable();
            $table->string('drawing_no')->nullable();
            $table->string('vendor')->nullable();
            $table->string('type')->nullable();
            $table->string('serial')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('interval');
            $table->date('start_job');
            $table->date('end_job');
            $table->string('issue_by')->nullable();
            $table->string('certificate_no')->nullable();
            $table->date('issue_date')->nullable();
            $table->date('next_inspection')->nullable();
            $table->string('specification_detail')->nullable();
            $table->string('maintenance_detail')->nullable();
            $table->integer('number_approval')->nullable();
            $table->date('date_approval')->nullable();
            $table->string('pnd_place')->nullable();
            $table->date('pnd_date')->nullable();
            $table->date('validity')->nullable();
            $table->string('maker')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('inventory_units');
    }
};
