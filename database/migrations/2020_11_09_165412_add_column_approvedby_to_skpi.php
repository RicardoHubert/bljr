<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnApprovedbyToSkpi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skpi', function (Blueprint $table) {
            $table->integer("approvedby");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skpi', function (Blueprint $table) {
            $table->dropIfExists("approvedby");
        });
    }
}
