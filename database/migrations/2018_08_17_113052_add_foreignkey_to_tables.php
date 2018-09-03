<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeyToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('status_id')->references('id')->on('status');

        });
        Schema::table('upd_cardholder', function (Blueprint $table) {
            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('status_id')->references('id')->on('status');

        });
        Schema::table('card_issue', function (Blueprint $table) {
            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('status_id')->references('id')->on('status');

        });
        Schema::table('card_reissue', function (Blueprint $table) {
            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('status_id')->references('id')->on('status');

        });
        Schema::table('additional_card', function (Blueprint $table) {
            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('status_id')->references('id')->on('status');

        });
        Schema::table('activate_card', function (Blueprint $table) {
            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('status_id')->references('id')->on('status');

        });
        Schema::table('card_load', function (Blueprint $table) {
            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('status_id')->references('id')->on('status');

        });
        Schema::table('status', function (Blueprint $table) {
            $table->foreign('response_id')->references('id')->on('responses');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('status_id')->references('id')->on('status');
        });
        Schema::table('upd_cardholder', function (Blueprint $table) {
            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('status_id')->references('id')->on('status');

        });
        Schema::table('card_issue', function (Blueprint $table) {
            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('status_id')->references('id')->on('status');

        });
        Schema::table('card_reissue', function (Blueprint $table) {
            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('status_id')->references('id')->on('status');

        });
        Schema::table('additional_card', function (Blueprint $table) {
            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('status_id')->references('id')->on('status');

        });
        Schema::table('activate_card', function (Blueprint $table) {
            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('status_id')->references('id')->on('status');

        });
        Schema::table('card_load', function (Blueprint $table) {
            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('status_id')->references('id')->on('status');

        });
        Schema::table('status', function (Blueprint $table) {
            $table->foreign('response_id')->references('id')->on('responses');

        });
    }
}
