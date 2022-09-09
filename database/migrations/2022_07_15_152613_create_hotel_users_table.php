<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('contact',15);
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('username',100)->unique();
            $table->string('password');
            $table->timestamps();
            $table->unsignedBigInteger('hotel_profile_id')->nullable();
            $table->foreign('hotel_profile_id')->references('id')->on('hotel_profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_users');
    }
}
