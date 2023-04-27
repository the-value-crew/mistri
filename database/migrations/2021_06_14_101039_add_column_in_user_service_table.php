<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInUserServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_service', function (Blueprint $table) {
            $table->unsignedBigInteger('service_category_id')->after('user_id');
            $table->foreign('service_category_id')->references('id')->on('service_categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_service', function (Blueprint $table) {
            //
        });
    }
}
