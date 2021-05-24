<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OpportunityDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunity_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('opportunity_id');
            $table->string('benefits');
            $table->string('application_process');
            $table->string('further_queries')->nullable();
            $table->string('eligibilities');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('official_link')->nullable();
            $table->string('eligibble_regions')->nullable();
            $table->timestamps();
        });
        Schema::table('opportunity_details', function (Blueprint $table) {
            $table->foreign('opportunity_id')->references('id')->on('opportunities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
