<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CodeGenerationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_generation', function (Blueprint $table) {
            $table->id();
            $table->string('prefix')->unique();
            $table->integer('next_num');
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
        Schema::table('code_generation', function (Blueprint $table) {
            //
        });
    }
}
