<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');

            $table->unsignedBigInteger('tourist_id');
            $table->foreign('tourist_id')->references('id')->on('tourists')->onDelete('cascade');

            $table->date('start_date');
            $table->date('end_date');

            $table->unsignedBigInteger('room_id')->nullable();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');

            $table->unsignedBigInteger('offer_id')->nullable();
            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');

            $table->integer('status')->default(0);
            $table->integer('rating')->nullable();
            $table->text('comment')->nullable();
            $table->text('complaint')->nullable();
            $table->integer('pkg_qty')->default(1);
            $table->float('total');
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
        Schema::dropIfExists('bookings');
    }
}
