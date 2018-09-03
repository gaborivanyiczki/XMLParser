<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeysNewCH extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('new_cardholder', function (Blueprint $table) {
            Schema::table('new_cardholder', function (Blueprint $table) {
                $table->foreign('request_id')->references('id')->on('requests');
                $table->foreign('status_id')->references('id')->on('status');

            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('new_cardholder', function (Blueprint $table) {
            Schema::table('new_cardholder', function (Blueprint $table) {
                $table->foreign('request_id')->references('id')->on('requests');
                $table->foreign('status_id')->references('id')->on('status');

            });
        });
    }
}
