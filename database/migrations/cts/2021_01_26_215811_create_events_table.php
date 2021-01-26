<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection('cts')->statement("SET SESSION sql_mode='NO_ZERO_IN_DATE';");

        Schema::create('events', function (Blueprint $table) {
            //
        });

        // DB::connection('cts')->statement(
        //     "create table events
        //     (
        //         id smallint(5) unsigned auto_increment
        //             primary key,
        //         event varchar(100) default '' not null,
        //         date date default '0000-00-00' not null,
        //         `from` time default '00:00:00' not null,
        //         `to` time default '00:00:00' not null,
        //         image enum('0', 'jpeg', 'jpg', 'gif', 'png') default '0' null,
        //         text longtext not null,
        //         tagline varchar(100) not null,
        //         thread varchar(150) null,
        //         add_by int(7) unsigned default 0 not null,
        //         add_date datetime default '0000-00-00 00:00:00' not null,
        //         gone int(1) default 0 not null,
        //         priority int(1) default 1 not null
        //     ) charset=utf8mb4;"
        // );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
