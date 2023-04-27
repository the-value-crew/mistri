<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('refer_by_user');
            $table->unsignedBigInteger('used_by_user');
            $table->timestamp('used_at');
            $table->timestamps();
            $table->foreign('refer_by_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('used_by_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refers');
    }
}
