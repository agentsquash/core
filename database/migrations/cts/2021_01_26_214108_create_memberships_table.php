<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection('cts')->statement("SET SESSION sql_mode='NO_ZERO_IN_DATE';");

        Schema::connection('cts')->create('memberships', function (Blueprint $table) {
            //
        });

        // DB::connection('cts')->statement(
        //     "CREATE TABLE `memberships`
        //     (
        //       `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
        //       `rts_id` smallint(5) unsigned NOT NULL DEFAULT 0,
        //       `member_id` int(7) unsigned NOT NULL DEFAULT 0,
        //       `type` enum('','H','A','V') NOT NULL DEFAULT '',
        //       `rtsm` tinyint(1) unsigned DEFAULT 0,
        //       `rtsi` tinyint(1) unsigned DEFAULT 0,
        //       `hidden` enum('0','1') NOT NULL DEFAULT '0',
        //       `sequence` smallint(3) NOT NULL DEFAULT 999,
        //       `other` tinyint(1) NOT NULL DEFAULT 0,
        //       `pending` tinyint(1) unsigned DEFAULT 0,
        //       `joined` date DEFAULT NULL,
        //       `confirmed` timestamp NULL DEFAULT NULL,
        //       PRIMARY KEY (`id`),
        //       KEY `member_id` (`member_id`),
        //       KEY `rts_id` (`rts_id`)
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
        Schema::dropIfExists('memberships');
    }
}
