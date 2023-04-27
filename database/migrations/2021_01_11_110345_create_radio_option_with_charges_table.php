<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadioOptionWithChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radio_option_with_charges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('radio_field_with_charge_id');
            $table->string('option');
            $table->string('charge');
            $table->timestamps();
            $table->foreign('radio_field_with_charge_id')->references('id')->on('radio_field_with_charges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('radio_option_with_charges');
    }
}
