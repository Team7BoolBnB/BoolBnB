<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToSponsorshipAccommodationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sponsorship_accommodation', function (Blueprint $table) {
            $table->dateTime("startTime");
            $table->dateTime("endTime");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sponsorship_accommodation', function (Blueprint $table) {
            $table->dropColumn("startTime");
            $table->dropColumn("endTime");

        });
    }
}
