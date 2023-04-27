<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('check_field_id');
            $table->string('option');
            $table->timestamps();
            $table->foreign('check_field_id')->references('id')->on('check_fields')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_options');
    }
}
