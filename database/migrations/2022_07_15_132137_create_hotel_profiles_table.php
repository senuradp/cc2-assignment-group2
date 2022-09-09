<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('leagal_name');
            $table->string('contacts')->nullable();
            $table->string('address');
            $table->float('lat')->default(0)->nullable();
            $table->float('lng')->default(0)->nullable();
            $table->text('description');
            $table->string('logo');
            $table->timestamps();
            $table->boolean('status')->default(true);
            $table->string('facebook_link');
            $table->string('video_url');
            $table->boolean('registration_fee_status')->default(false);
            $table->unsignedBigInteger('hotel_type_id');
            $table->foreign('hotel_type_id')->references('id')->on('hotel_types')->onDelete('cascade');
            $table->unsignedBigInteger('approved_by');
            $table->foreign('approved_by')->references('id')->on('admins')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_profiles');
    }
}
