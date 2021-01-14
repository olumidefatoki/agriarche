<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // $this->call(BuyerSeeder::class);
        $this->call(CommoditySeeder::class);
        $this->call(BankSeeder::class);
        $this->call(StatusSeeder::class);
    }
}
