<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSiteAcknowledgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_acknowledge', function(Blueprint $table) {
            $table->string('renstra_checked_by', 100)->nullable()->after('renstra');
            $table->string('perolehan_checked_by', 100)->nullable()->after('perolehan');
            $table->string('pemanfaatan_checked_by', 100)->nullable()->after('pemanfaatan');
        });

        Schema::table('site_acknowledge', function(Blueprint $table) {
            $table->timestamp('renstra_checked_at')->nullable()->after('renstra_checked_by');
            $table->timestamp('perolehan_checked_at')->nullable()->after('perolehan_checked_by');
            $table->timestamp('pemanfaatan_checked_at')->nullable()->after('pemanfaatan_checked_by');
        });

        Schema::table('site_acknowledge', function(Blueprint $table) {
            $table->string('renstra_unchecked_by', 100)->nullable()->after('renstra_checked_at');
            $table->string('perolehan_unchecked_by', 100)->nullable()->after('perolehan_checked_at');
            $table->string('pemanfaatan_unchecked_by', 100)->nullable()->after('pemanfaatan_checked_at');
        });

        Schema::table('site_acknowledge', function(Blueprint $table) {
            $table->timestamp('renstra_unchecked_at')->nullable()->after('renstra_unchecked_by');
            $table->timestamp('perolehan_unchecked_at')->nullable()->after('perolehan_unchecked_by');
            $table->timestamp('pemanfaatan_unchecked_at')->nullable()->after('pemanfaatan_unchecked_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('renstra_checked_by');
            $table->dropColumn('renstra_checked_at');
            $table->dropColumn('renstra_unchecked_by');
            $table->dropColumn('renstra_unchecked_at');
            
            $table->dropColumn('perolehan_checked_by');
            $table->dropColumn('perolehan_checked_at');
            $table->dropColumn('perolehan_unchecked_by');
            $table->dropColumn('perolehan_unchecked_at');
            
            $table->dropColumn('pemanfaatan_checked_by');
            $table->dropColumn('pemanfaatan_checked_at');
            $table->dropColumn('pemanfaatan_unchecked_by');
            $table->dropColumn('pemanfaatan_unchecked_at');
        });
    }
}
