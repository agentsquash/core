<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection('cts')->statement("SET SESSION sql_mode='NO_ZERO_IN_DATE';");

        Schema::connection('cts')->create('bookings', function (Blueprint $table) {
            $table->unsignedMediumInteger('id')->autoIncrement();
            $table->date('date')->default('0000-00-00');
            $table->time('from')->default('00:00:00');
            $table->time('to')->default('00:00:00');
            $table->string('position')->default('');
            $table->integer('member_id')->default(0);
            $table->string('type')->default('');
            $table->unsignedMediumInteger('type_id')->default(0);
            $table->mediumInteger('groupID')->nullable();
            $table->dateTime('time_booked')->default('0000-00-00 00:00:00');
            $table->bigInteger('local_id');
            $table->unsignedBigInteger('eurobook_id')->nullable();
            $table->tinyInteger('eurobook_import')->default(0);
        });


        //       PRIMARY KEY (`id`),
        //       KEY `date` (`date`)
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
