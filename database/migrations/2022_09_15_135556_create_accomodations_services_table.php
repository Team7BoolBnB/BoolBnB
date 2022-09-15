<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccomodationsServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodations_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("accomodation_id");
            $table->foreign("accomodation_id")->references("id")->on("accomodations");
            $table->unsignedBigInteger("accomodation_id");
            $table->foreign("service_id")->references("id")->on("services");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accomodations_services');
    }
}
