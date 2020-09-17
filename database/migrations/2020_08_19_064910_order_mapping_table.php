<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_mapping', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buyer_order_id');
            $table->decimal('price',13,2);	
            $table->unsignedBigInteger('aggregator_id');
            $table->foreign('buyer_order_id')->references('id')->on('buyer_order');
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
        Schema::dropIfExists('order_mapping');
    }
}
