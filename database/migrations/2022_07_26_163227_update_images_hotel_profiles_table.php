<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateImagesHotelProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotel_profiles', function (Blueprint $table) {
            $table->text('images')->after('logo')->nullable();
            $table->string('stripe_id')->nullable()->collation('utf8mb4_bin');
            $table->string('card_last_four', 4)->nullable();
            $table->string('card_brand')->nullable();
            $table->float('reg_free',15,2)->nullable();
            $table->unsignedBigInteger('approved_by')->nullable()->change();
            $table->float('lat',4,15)->default(0)->nullable()->change();
            $table->float('lng',4,15)->default(0)->nullable()->change();
            $table->text('logo')->nullable()->change();
            $table->string('facebook_link')->nullable()->change();
            $table->string('video_url')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotel_profiles', function (Blueprint $table) {
            $table->dropColumn('images');
            $table->dropColumn('stripe_id');
            $table->dropColumn('card_brand');
            $table->dropColumn('card_last_four');
            $table->dropColumn('reg_free');
            $table->unsignedBigInteger('approved_by')->change();
            $table->float('lat')->default(0)->nullable()->change();
            $table->float('lng')->default(0)->nullable()->change();
            $table->string('logo')->change();
            $table->string('facebook_link')->change();
            $table->string('video_url')->change();
        });
    }
}
