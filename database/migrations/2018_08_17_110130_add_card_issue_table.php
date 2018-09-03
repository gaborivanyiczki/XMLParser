<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCardIssueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_issue', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('request_id');
            $table->unsignedInteger('status_id')->nullable();
            $table->string('action_ref');
            $table->string('fulfil_data_1')->nullable();
            $table->string('card_seq_no_start')->nullable();
            $table->string('card_seq_no_end')->nullable();
            $table->string('client_code')->nullable();
            $table->string('card_cli_name')->nullable();
            $table->string('cho_code')->nullable();
            $table->string('card_cho_name')->nullable();
            $table->string('act_code')->nullable();
            $table->string('fulfil_data_2')->nullable();
            $table->string('fulfil_data_3')->nullable();
            $table->string('card_exp_date')->nullable();
            $table->string('prc_code')->nullable();
            $table->string('card_design_code')->nullable();
            $table->string('stationery_code')->nullable();
            $table->string('delivery_code')->nullable();
            $table->string('disp_title')->nullable();
            $table->string('disp_first_name')->nullable();
            $table->string('disp_last_name')->nullable();
            $table->string('disp_add_line_1')->nullable();
            $table->string('disp_add_line_2')->nullable();
            $table->string('disp_add_line_3')->nullable();
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
        Schema::dropIfExists('card_issue');
    }
}
