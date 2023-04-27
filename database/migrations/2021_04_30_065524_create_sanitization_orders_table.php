<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanitizationOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanitization_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('premises_type',20);
            $table->string('home_type',20)->nullable();
            $table->string('home_size',20)->nullable();
            $table->json('treatment_for');
            $table->time('time');
            $table->date('date');

            $table->string('office_size',20)->nullable();
            $table->integer('number_of_cabin')->nullable();
            $table->integer('number_of_desk')->nullable();

            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanitization_orders');
    }
}
