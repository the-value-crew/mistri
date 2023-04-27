<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServieRadioOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servie_radio_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_radio_field_id');
            $table->string('option');
            $table->string('charge');
            $table->timestamps();
            $table->foreign('service_radio_field_id')->references('id')->on('service_radio_fields')->onDelete('cascade');        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servie_radio_options');
    }
}
