<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSponsorCodeToModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('new_cardholder', function (Blueprint $table) {
            $table->string('sponsor_code')->nullable();
        });
        Schema::table('clients', function (Blueprint $table) {
            $table->string('sponsor_code')->nullable();
        });
        Schema::table('upd_cardholder', function (Blueprint $table) {
            $table->string('sponsor_code')->nullable();
        });
        Schema::table('card_issue', function (Blueprint $table) {
            $table->string('sponsor_code')->nullable();
        });
        Schema::table('card_reissue', function (Blueprint $table) {
            $table->string('sponsor_code')->nullable();
        });
        Schema::table('additional_card', function (Blueprint $table) {
            $table->string('sponsor_code')->nullable();
        });
        Schema::table('card_load', function (Blueprint $table) {
            $table->string('sponsor_code')->nullable();
        });
        Schema::table('activate_card', function (Blueprint $table) {
            $table->string('sponsor_code')->nullable();
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
            $table->string('sponsor_code')->nullable();
        });
        Schema::table('clients', function (Blueprint $table) {
            $table->string('sponsor_code')->nullable();
        });
        Schema::table('upd_cardholder', function (Blueprint $table) {
            $table->string('sponsor_code')->nullable();
        });
        Schema::table('card_issue', function (Blueprint $table) {
            $table->string('sponsor_code')->nullable();
        });
        Schema::table('card_reissue', function (Blueprint $table) {
            $table->string('sponsor_code')->nullable();
        });
        Schema::table('additional_card', function (Blueprint $table) {
            $table->string('sponsor_code')->nullable();
        });
        Schema::table('card_load', function (Blueprint $table) {
            $table->string('sponsor_code')->nullable();
        });
        Schema::table('activate_card', function (Blueprint $table) {
            $table->string('sponsor_code')->nullable();
        });
    }
}
