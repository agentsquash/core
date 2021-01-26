<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValidationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection('cts')->statement("SET SESSION sql_mode='NO_ZERO_IN_DATE';");

        Schema::connection('cts')->create('validations', function (Blueprint $table) {
            //
        });

        // DB::connection('cts')->statement(
        //     'CREATE TABLE `validations` (
        //           `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
        //           `position_id` smallint(5) unsigned NOT NULL DEFAULT 0,
        //           `member_id` int(7) unsigned NOT NULL DEFAULT 0,
        //           `awarded_by` int(7) unsigned NOT NULL DEFAULT 0,
        //           `awarded_date` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
        //           PRIMARY KEY (`id`)
        //         ) DEFAULT CHARSET=utf8mb4;'
        // );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('validations');
    }
}
