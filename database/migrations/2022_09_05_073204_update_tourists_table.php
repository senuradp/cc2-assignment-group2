<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTouristsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tourists', function (Blueprint $table) {

            $table->string('state',100)->after('country')->nullable();
            $table->string('zip',10)->after('state')->nullable();
            $table->text('address')->after('zip')->nullable();

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
            $table->dropColumn('state');
            $table->dropColumn('zip');
            $table->dropColumn('address');
        });
    }
}
