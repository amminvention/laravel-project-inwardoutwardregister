<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inwards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('inward_no')->unique();
            $table->date('inward_date');
            $table->date('receive_date');
            $table->date('letter_date');
            $table->string('letter_ref_no');
            $table->string('subject');
            $table->string('from_details_name');
            $table->string('from_details_address')->nullable();
            $table->string('to_details_person_name')->nullable();
            $table->string('courier_details_courier_name')->nullable();
            $table->string('courier_details_description')->nullable();
            $table->integer('mode_id')->unsigned();
            $table->integer('outward_id')->unsigned()->nullable();
            $table->integer('department_id')->unsigned();
            $table->integer('courier_id')->unsigned()->nullable();

            $table->foreign('mode_id')->references('id')->on('modes')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('courier_id')->references('id')->on('couriers')->onDelete('no action')->onUpdate('cascade');

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
        Schema::dropIfExists('inwards');
    }
}
