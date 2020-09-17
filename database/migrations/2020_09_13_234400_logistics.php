<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Logistics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Logistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buyer_order_id');
            $table->unsignedBigInteger('aggregator_id');
            $table->decimal('quantity',13,2);	
            $table->integer('no_of_bags');
            $table->unsignedBigInteger('logistics_company_id');
            $table->string('truck_number');	
            $table->string('driver_name');	
            $table->string('driver_phone_number');	
            $table->unsignedBigInteger('status_id');	
            $table->foreign('buyer_order_id')->references('id')->on('buyer_order');
            $table->foreign('aggregator_id')->references('id')->on('aggregator');
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('logistics_company_id')->references('id')->on('logistics_company');
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
        Schema::dropIfExists('Logisitics');
    }
}
