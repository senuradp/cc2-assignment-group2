<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTouristsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourists', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('email')->unique();
            $table->string('fb_id')->unique()->nullable();
            $table->string('google_id')->unique()->nullable();
            $table->string('username',100)->nullable();
            $table->string('password')->nullable();
            $table->string('contacts')->nullable();
            $table->date('dob')->nullable();
            $table->string('passport',20)->unique()->nullable();
            $table->boolean('status')->default(true);
            $table->string('country')->nullable();
            $table->string('support_document_url')->nullable();
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
        Schema::dropIfExists('tourists');
    }
}
