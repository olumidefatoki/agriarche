<?php

use Illuminate\Database\Seeder;

class PaymentTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_term')->insert(['name' => 'Instantly']);
        DB::table('payment_term')->insert(['name' => '2 Days']);
        DB::table('payment_term')->insert(['name' => '3 Days']);
        DB::table('payment_term')->insert(['name' => '5 Days']);
        DB::table('payment_term')->insert(['name' => '7 Days']);
        DB::table('payment_term')->insert(['name' => 'Other']);

    }
}
