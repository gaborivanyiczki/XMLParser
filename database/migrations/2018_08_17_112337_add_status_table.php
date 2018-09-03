<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('response_id');
            $table->string('action_ref');
            $table->string('status')->nullable();
            $table->string('result_code')->nullable();
            $table->string('result_detail')->nullable();
            $table->string('card_seq_no_start')->nullable();
            $table->string('card_seq_no_end')->nullable();
            $table->string('account_no')->nullable();
            $table->string('card_masked_pan')->nullable();

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
        Schema::dropIfExists('status');
    }
}
