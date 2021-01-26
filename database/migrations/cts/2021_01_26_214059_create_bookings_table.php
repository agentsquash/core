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
            //
        });


        // DB::connection('cts')->statement(
        //     "CREATE TABLE `bookings` (
        //       `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
        //       `date` date NOT NULL DEFAULT '0000-00-00',
        //       `from` time NOT NULL DEFAULT '00:00:00',
        //       `to` time NOT NULL DEFAULT '00:00:00',
        //       `position` varchar(12) NOT NULL DEFAULT '',
        //       `member_id` int(7) unsigned NOT NULL DEFAULT 0,
        //       `type` char(2) NOT NULL DEFAULT '',
        //       `type_id` mediumint(8) unsigned NOT NULL DEFAULT 0,
        //       `groupID` mediumint(8) DEFAULT NULL,
        //       `time_booked` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
        //       `local_id` bigint(50) NOT NULL,
        //       `eurobook_id` bigint(50) unsigned DEFAULT NULL,
        //       `eurobook_import` tinyint(1) NOT NULL DEFAULT 0,
        //       PRIMARY KEY (`id`),
        //       KEY `date` (`date`)
        //     ) ENGINE=InnoDB AUTO_INCREMENT=96258 DEFAULT CHARSET=utf8mb4;"
        // );
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
