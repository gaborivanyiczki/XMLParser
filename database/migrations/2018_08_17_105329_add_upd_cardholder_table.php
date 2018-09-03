<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUpdCardholderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upd_cardholder', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('request_id');
            $table->unsignedInteger('status_id')->nullable();
            $table->string('action_ref');
            $table->string('cho_code');
            $table->string('client_code')->nullable();
            $table->string('cho_title')->nullable();
            $table->string('cho_first_name')->nullable();
            $table->string('cho_dob')->nullable();
            $table->string('cho_add_line_1')->nullable();
            $table->string('cho_add_line_2')->nullable();
            $table->string('cho_add_line_3')->nullable();
            $table->string('cho_add_town')->nullable();
            $table->string('cho_add_postcode')->nullable();
            $table->string('cho_country')->nullable();
            $table->string('cho_employee_ref')->nullable();
            $table->string('cho_tel_1')->nullable();
            $table->string('cho_tel_2')->nullable();
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
        Schema::dropIfExists('upd_cardholder');
    }
}
