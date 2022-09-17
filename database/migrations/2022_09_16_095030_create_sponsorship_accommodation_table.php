<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorshipAccommodationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsorship_accommodation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("accommodation_id");
            $table->foreign("accommodation_id")->references("id")->on("accommodations");
            $table->unsignedBigInteger("sponsorship_id");
            $table->foreign("sponsorship_id")->references("id")->on("sponsorships");
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
        Schema::dropIfExists('sponsorship_accommodation');
    }
}
