<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processor', function (Blueprint $table) {
            $table->id();
            $table->string('name');	
            $table->string('category');	
            $table->string('address', 255);	
            $table->string('contact_person_first_name', 50);
            $table->string('contact_person_last_name', 50)->nullable();	
            $table->string('contact_person_email', 255)->unique();	
            $table->string('contact_person_phone_number', 11)->unique();
            $table->string('kyc_cac')->nullable();	
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->foreign('state_id')->references('id')->on('state');
            $table->foreign('created_by')->references('id')->on('user_id');
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
        Schema::table('processor', function (Blueprint $table) {
            //
        });
    }
}
