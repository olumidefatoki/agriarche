<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LogisticsTable extends Migration
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
            $table->string('code');	
            $table->unsignedBigInteger('processor_order_id');
            $table->unsignedBigInteger('aggregator_id');
            $table->integer('no_of_bags');
            $table->unsignedBigInteger('logistics_company_id');
            $table->string('truck_number');	
            $table->string('driver_name');	
            $table->string('driver_phone_number');	
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');	
            $table->foreign('processor_order_id')->references('id')->on('processor_order');
            $table->foreign('aggregator_id')->references('id')->on('aggregator');
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('logistics_company_id')->references('id')->on('logistics_company');            
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
        Schema::table('company', function (Blueprint $table) {
            //
        });
    }
}
