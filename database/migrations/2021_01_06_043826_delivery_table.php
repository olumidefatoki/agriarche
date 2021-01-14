<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('logistics_id');
            $table->decimal('order_price',13,2);
            $table->decimal('aggregator_price',13,2);
            $table->decimal('order_commission',13,2);
            $table->decimal('discounted_price',13,2);
            $table->decimal('accepted_quantity',13,2);	
            $table->integer('rejected_no_of_bags');
            $table->longText('waybill');	
            $table->unsignedBigInteger('status_id');	            
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');	
            $table->foreign('logistics_id')->references('id')->on('logistics');
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('created_by')->references('id')->on('users');
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
        Schema::table('delivery', function (Blueprint $table) {
            //
        });
    }
}
