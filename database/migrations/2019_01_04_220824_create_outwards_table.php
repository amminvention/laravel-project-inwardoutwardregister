<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outwards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('outward_no')->unique();
            $table->date('outward_date');
            $table->date('letter_date');
            $table->string('letter_ref_no');
            $table->string('subject');
            $table->string('from_details_person_name')->nullable();
            $table->string('to_details_name');
            $table->string('to_details_place')->nullable();
            $table->string('to_details_address')->nullable();
            $table->string('courier_details_receipt_no')->nullable();
            $table->date('courier_details_receipt_date')->nullable();
            $table->double('courier_details_amount', 10, 2)->nullable();
            $table->boolean('courier_details_is_return')->default(false)->nullable();
            $table->date('courier_details_return_date')->nullable();
            $table->text('courier_details_return_reason')->nullable();
            $table->text('courier_details_description')->nullable();
            $table->integer('mode_id')->unsigned();
            $table->integer('inward_id')->unsigned()->nullable();
            $table->integer('department_id')->unsigned();
            $table->integer('courier_id')->unsigned()->nullable();

            $table->timestamps();

            $table->foreign('mode_id')->references('id')->on('modes')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('inward_id')->references('id')->on('inwards')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('courier_id')->references('id')->on('couriers')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outwards');
    }
}
