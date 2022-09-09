<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSocialTourists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tourists', function (Blueprint $table) {
            $table->renameColumn('fb_id','provider');
            $table->renameColumn('google_id','provider_id');
            $table->string('access_token')->after('google_id')->nullable();
            $table->text('image')->after('contacts')->nullable();
            $table->dropColumn('username');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tourists', function (Blueprint $table) {
            $table->renameColumn('provider','fb_id');
            $table->renameColumn('provider_id','google_id');
            $table->dropColumn('access_token');
            $table->dropColumn('image');
            $table->string('username',100)->after('access_token')->nullable();
        });
    }
}
