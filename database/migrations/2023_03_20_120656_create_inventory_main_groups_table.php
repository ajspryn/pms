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
        Schema::create('inventory_main_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid', 191);
            $table->integer('code_main_group');
            $table->string('ship_id');
            $table->index('uuid');
            $table->string('name');
            $table->text('specification')->nullable();
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
        Schema::dropIfExists('inventory_main_groups');
    }
};
