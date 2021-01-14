<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessorOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processor_order', function (Blueprint $table) {
            $table->id();
           $table->string('code')->unique();
           $table->unsignedBigInteger('processor_id');
           $table->decimal('quantity',13,2);	
           $table->decimal('price',13,2);	
           $table->string('delivery_location');
           $table->unsignedBigInteger('commodity_id');
           $table->unsignedBigInteger('state_id');
           $table->dateTime('start_date', 0);	
           $table->dateTime('end_date', 0);	
           $table->unsignedBigInteger('created_by');
           $table->unsignedBigInteger('updated_by');
           $table->foreign('processor_id')->references('id')->on('processor');
           $table->foreign('commodity_id')->references('id')->on('commodity');
           $table->foreign('state_id')->references('id')->on('state');
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
        Schema::table('processor_order', function (Blueprint $table) {
            //
        });
    }
}
