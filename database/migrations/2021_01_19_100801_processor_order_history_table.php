<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProcessorOrderHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processor_order_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('processor_order_id');
            $table->unsignedBigInteger('processor_id');
            $table->decimal('quantity', 13, 2);
            $table->decimal('price', 13, 2);
            $table->unsignedBigInteger('commodity_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('updated_by');
            $table->foreign('processor_id')->references('id')->on('processor');
            $table->foreign('commodity_id')->references('id')->on('commodity');
            $table->foreign('state_id')->references('id')->on('state');
            $table->foreign('processor_order_id')->references('id')->on('processor_order');
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
        Schema::table('ProcessorOrderHistory', function (Blueprint $table) {
            //
        });
    }
}
