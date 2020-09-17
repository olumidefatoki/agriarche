<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert(['name' => 'Inactive']);
        DB::table('status')->insert(['name' => 'Active']);
        DB::table('status')->insert(['name' => 'Transit']);
        DB::table('status')->insert(['name' => 'Arrived']);
        DB::table('status')->insert(['name' => 'Delivered']);
        DB::table('status')->insert(['name' => 'Pending']);
        DB::table('status')->insert(['name' => 'Approved']);

    }
}
