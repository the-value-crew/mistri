<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceSelectFieldOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_select_field_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_select_field_id');
            $table->string('option');
            $table->string('charge');
            $table->timestamps();
            $table->foreign('service_select_field_id')->references('id')->on('service_select_fields')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_select_field_options');
    }
}
