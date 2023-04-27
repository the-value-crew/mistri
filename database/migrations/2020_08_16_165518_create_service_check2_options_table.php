<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceCheck2OptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_check2_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_check2_field_id');
            $table->string('option');
            $table->timestamps();
            $table->foreign('service_check2_field_id')->references('id')->on('service_check2_fields')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_check2_options');
    }
}
