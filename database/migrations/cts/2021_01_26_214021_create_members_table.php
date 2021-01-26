<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection('cts')->statement("SET SESSION sql_mode='NO_ZERO_IN_DATE';");

        Schema::connection('cts')->create('members', function (Blueprint $table) {
            $table->unsignedSmallInteger('old_rts_id');
            $table->bigInteger('id');
            $table->tinyInteger('home_rts_id')->default(0);
            $table->unsignedMediumInteger('cid')->nullable()->default(0);
            $table->string('name')->default('');
            $table->string('email')->default('');
            $table->string('password')->default('');
            $table->unsignedTinyInteger('rating')->default(0);
            $table->tinyInteger('prating')->default(0);
            $table->enum('disabled', ['0', '1'])->default('0');
            $table->unsignedTinyInteger('visiting')->nullable()->default(0);
            $table->string('visit_from')->nullable();
            $table->string('visit_may_control')->nullable();
            $table->mediumText('visit_requested')->nullable();
            $table->enum('visit_ptd', ['0', '1'])->default('0');
            $table->unsignedTinyInteger('ageband')->nullable();
            $table->string('country')->nullable();
            $table->enum('experience', ['P','A','B','N'])->nullable();
            $table->tinyInteger('bt_start_hour')->default(18);
            $table->tinyInteger('bt_start_min')->default(30);
            $table->tinyInteger('bt_end_hour')->default(21);
            $table->tinyInteger('bt_end_min')->default(30);
            $table->unsignedTinyInteger('examiner')->default(0);
            $table->unsignedTinyInteger('examiner_app')->default(0);
            $table->tinyInteger('examiner_p_app')->default(0);
            $table->unsignedTinyInteger('admin')->nullable()->default(0);
            $table->tinyInteger('admin_rts')->default(0);
            $table->tinyInteger('admin_rtsi')->default(0);
            $table->tinyInteger('admin_ex')->default(0);
            $table->integer('ins')->default(0);
            $table->dateTime('joined')->default('0000-00-00 00:00:00');
            $table->dateTime('joined_div');
            $table->dateTime('last_cert_check')->nullable();
            $table->unsignedTinyInteger('verified')->default(0);
            $table->unsignedTinyInteger('deleted')->default(0);
            $table->tinyInteger('updated')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
