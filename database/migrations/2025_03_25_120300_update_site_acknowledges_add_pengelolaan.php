<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSiteAcknowledgesAddPengelolaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_acknowledge', function(Blueprint $table) {
            $table->integer('pengelolaan')->default('0')->after('perolehan_unchecked_at');
            $table->string('pengelolaan_checked_by', 100)->nullable()->after('pengelolaan');
            $table->timestamp('pengelolaan_checked_at')->nullable()->after('pengelolaan_checked_by');
            $table->string('pengelolaan_unchecked_by', 100)->nullable()->after('pengelolaan_checked_at');
            $table->timestamp('pengelolaan_unchecked_at')->nullable()->after('pengelolaan_unchecked_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_acknowledge', function($table) {
            $table->dropColumn('pengelolaan');
            $table->dropColumn('pengelolaan_checked_by');
            $table->dropColumn('pengelolaan_checked_at');
            $table->dropColumn('pengelolaan_unchecked_by');
            $table->dropColumn('pengelolaan_unchecked_at');
        });
    }
}
