<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultipleInputFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiple_input_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('label_for_multiple_input_id');
            $table->string('input_field_label');
            $table->timestamps();
            $table->foreign('label_for_multiple_input_id')->references('id')->on('label_for_multiple_inputs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('multiple_input_fields');
    }
}
