<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailableOnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('available_ons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');

            $table->time('monday_opening_time')->nullable();
            $table->time('monday_closing_time')->nullable();
            $table->boolean('monday_status')->default(0);

            $table->time('tuesday_opening_time')->nullable();
            $table->time('tuesday_closing_time')->nullable();
            $table->boolean('tuesday_status')->default(0);

            $table->time('wednesday_opening_time')->nullable();
            $table->time('wednesday_closing_time')->nullable();
            $table->boolean('wednesday_status')->default(0);

            $table->time('thursday_opening_time')->nullable();
            $table->time('thursday_closing_time')->nullable();
            $table->boolean('thursday_status')->default(0);

            $table->time('friday_opening_time')->nullable();
            $table->time('friday_closing_time')->nullable();
            $table->boolean('friday_status')->default(0);

            $table->time('saturday_opening_time')->nullable();
            $table->time('saturday_closing_time')->nullable();
            $table->boolean('saturday_status')->default(0);

            $table->time('sunday_opening_time')->nullable();
            $table->time('sunday_closing_time')->nullable();
            $table->boolean('sunday_status')->default(0);
            $table->timestamps();
            $table->foreign('vendor_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('available_ons');
    }
}
