<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentialPestControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residential_pest_controls', function (Blueprint $table) {
            $table->id();
            $table->string('home_type',10);
            $table->unsignedBigInteger('pest_control_treatment_type_id');
            $table->decimal('1bhk',9,2);
            $table->decimal('2bhk',9,2);
            $table->decimal('3bhk',9,2);
            $table->decimal('4bhk',9,2);
            $table->decimal('5bhk',9,2);
            $table->string('other','20');
            $table->timestamps();
            $table->foreign('pest_control_treatment_type_id')->references('id')->on('pest_control_treatment_types')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('residential_pest_controls');
    }
}
