<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficePestControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('office_pest_controls', function (Blueprint $table) {
//            $table->id();
//            $table->unsignedBigInteger('treatment_type_id');
//            $table->decimal('home_size1',9,2);  /*Office size 100-500*/
//            $table->decimal('home_size2',9,2);  /*Office size 501-1000*/
//            $table->decimal('home_size3',9,2);  /*Office size 10001-1500*/
//            $table->decimal('home_size4',9,2);  /*Office size 1501-2000*/
//            $table->string('other');
//            $table->timestamps();
//            $table->foreign('treatment_type_id')->references('id')->on('pest_control_treatment_types')->onDelete('cascade');
//
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('office_pest_controls');
    }
}
