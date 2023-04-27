<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoptionValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkoption_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_checkoption_field_id');
            $table->string('option');
            $table->string('charge');
            $table->timestamps();
            $table->foreign('service_checkoption_field_id')->references('id')->on('service_checkoption_fields')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkoption_values');
    }
}
