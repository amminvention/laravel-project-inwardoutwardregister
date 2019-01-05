<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOutwardIdForeignKeyToInwards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inwards', function (Blueprint $table) {
            $table->foreign('outward_id')->references('id')->on('outwards')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inwards', function (Blueprint $table) {
            $table->dropForeign('inwards_outward_id_foreign');
        });
    }
}
