<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTimeValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_time_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_time_field_id');
            $table->string('time');
            $table->timestamps();
            $table->foreign('service_time_field_id')->references('id')->on('service_time_fields')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_time_values');
    }
}
