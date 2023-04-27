<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRefercodeStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_refercode_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('refer_by_user');
            $table->unsignedBigInteger('refer_to_user');
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->foreign('refer_by_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('refer_to_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_refercode_status');
    }
}
