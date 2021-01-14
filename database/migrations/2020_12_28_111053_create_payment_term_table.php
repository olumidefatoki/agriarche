<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTermTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_term', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->charset = 'utf8';	
            $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_term', function (Blueprint $table) {
            //
        });
    }
}
