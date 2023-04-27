<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorSelectFieldChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_select_field_charges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_provider_id');
            $table->unsignedBigInteger('field_id');
            $table->unsignedBigInteger('option_id');
            $table->unsignedBigInteger('service_id');
            $table->string('charge');
            $table->timestamps();
            $table->foreign('service_provider_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('option_id')->references('id')->on('select_option_with_charges')->onDelete('cascade');
            $table->foreign('field_id')->references('id')->on('select_field_with_charges')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_select_field_charges');
    }
}
