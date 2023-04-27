<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectOptionWithChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('select_option_with_charges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('select_field_with_charge_id');
            $table->string('option');
            $table->string('charge');
            $table->timestamps();
            $table->foreign('select_field_with_charge_id')->references('id')->on('select_field_with_charges')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('select_option_with_charges');
    }
}
