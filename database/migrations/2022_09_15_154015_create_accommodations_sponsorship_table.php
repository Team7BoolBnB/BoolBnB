<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccomodationsSponsorshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodations_sponsorship', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("accomodation_id");
            $table->foreign("accomodation_id")->references("id")->on("accomodations");
            $table->unsignedBigInteger("sponsorship_id");
            $table->foreign("sponsorship_id")->references("id")->on("sponsorships");
            $table->timestamp("startTime");
            $table->timestamp("endTime");
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
        Schema::dropIfExists('accomodations_sponsorship');
    }
}
