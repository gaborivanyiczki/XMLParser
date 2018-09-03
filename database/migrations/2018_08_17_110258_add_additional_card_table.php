<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionalCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_card', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('request_id');
            $table->unsignedInteger('status_id')->nullable();
            $table->string('action_ref');
            $table->string('cho_code')->nullable();
            $table->string('card_cho_name')->nullable();
            $table->string('prim_card_seq_no')->nullable();
            $table->string('card_seq_no')->nullable();
            $table->string('act_code')->nullable();
            $table->string('override_fee')->nullable();
            $table->string('fulfil_data_1')->nullable();
            $table->string('card_exp_date')->nullable();
            $table->string('card_design_code')->nullable();
            $table->string('stationery_code')->nullable();
            $table->string('delivery_code')->nullable();
            $table->string('disp_title')->nullable();
            $table->string('disp_first_name')->nullable();
            $table->string('disp_last_name')->nullable();
            $table->string('disp_add_line_1')->nullable();
            $table->string('disp_add_town')->nullable();
            $table->string('disp_add_postcode')->nullable();
            $table->string('disp_country')->nullable();
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
        Schema::dropIfExists('additional_card');
    }
}
