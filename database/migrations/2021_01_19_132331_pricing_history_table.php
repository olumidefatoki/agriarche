<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PricingHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pricing_id');
            $table->unsignedBigInteger('processor_order_id');
            $table->decimal('price', 13, 2);
            $table->decimal('commission', 13, 2);
            $table->unsignedBigInteger('aggregator_id');
            $table->unsignedBigInteger('updated_by');
            $table->foreign('processor_order_id')->references('id')->on('processor_order');
            $table->foreign('aggregator_id')->references('id')->on('aggregator');
            $table->foreign('pricing_id')->references('id')->on('pricing');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->timestamps();
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
        Schema::table('PricingHistory', function (Blueprint $table) {
            //
        });
    }
}
