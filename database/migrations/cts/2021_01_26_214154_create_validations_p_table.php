<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValidationsPTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection('cts')->statement("SET SESSION sql_mode='NO_ZERO_IN_DATE';");

        Schema::connection('cts')->create('validations_p', function (Blueprint $table) {
            //
        });

        // DB::connection('cts')->statement(
        //     'CREATE TABLE `validations_p` (
        //           `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
        //           `position` varchar(30) NOT NULL DEFAULT \'\',
        //           `rts` smallint(5) DEFAULT NULL,
        //           `min_rating` tinyint(1) NOT NULL DEFAULT 3,
        //           PRIMARY KEY (`id`)
        //         ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;'
        // );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('validations_p');
    }
}
