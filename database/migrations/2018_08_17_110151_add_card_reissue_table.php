<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCardReissueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_reissue', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('request_id');
            $table->unsignedInteger('status_id')->nullable();
            $table->string('action_ref');
            $table->string('crd_seq_no_orig')->nullable();
            $table->string('crd_seq_no_dest')->nullable();
            $table->string('act_code')->nullable();
            $table->string('override_fee')->nullable();
            $table->string('override_block')->nullable();
            $table->string('fulfil_data_1')->nullable();
            $table->string('card_cho_name')->nullable();
            $table->string('card_exp_date')->nullable();
            $table->string('card_design_code')->nullable();
            $table->string('stationery_code')->nullable();
            $table->string('delivery_code')->nullable();
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
        Schema::dropIfExists('card_reissue');
    }
}
