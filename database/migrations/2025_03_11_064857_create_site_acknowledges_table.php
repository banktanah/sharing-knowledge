<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteAcknowledgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_acknowledge', function (Blueprint $table) {
            $table->string('site_name', 100)->primary();
            $table->integer('renstra')->default('0');
            $table->integer('perolehan')->default('0');
            $table->integer('pemanfaatan')->default('0');
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
        Schema::dropIfExists('site_acknowledge');
    }
}
