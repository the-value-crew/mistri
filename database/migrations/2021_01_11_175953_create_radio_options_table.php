<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadioOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radio_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('radio_field_id');
            $table->string('option');
            $table->timestamps();
            $table->foreign('radio_field_id')->references('id')->on('radio_fields')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('radio_options');
    }
}
