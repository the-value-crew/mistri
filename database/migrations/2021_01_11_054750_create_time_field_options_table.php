<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeFieldOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_field_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('time_field_id');
            $table->string('time');
            $table->timestamps();
            $table->foreign('time_field_id')->references('id')->on('time_fields')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_field_options');
    }
}
