<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('processor_order_id');
            $table->decimal('price',13,2);	
            $table->decimal('commission',13,2);
            $table->unsignedBigInteger('aggregator_id');
            $table->unsignedBigInteger('created_by');
            $table->foreign('processor_order_id')->references('id')->on('processor_order');
            $table->foreign('aggregator_id')->references('id')->on('aggregator');
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
        Schema::table('pricing', function (Blueprint $table) {
            //
        });
    }
}
