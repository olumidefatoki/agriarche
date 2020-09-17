<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class BuyerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Faker::create();
        foreach (range(1, 200) as $index) {
            DB::table('buyer')->insert([
                'name' => $fake->name,
                'contact_person_email' => $fake->email,
                'address' => 'kano',
                'state_id' => 22,
                'contact_person_first_name' => $fake->name,
                'contact_person_last_name' => $fake->name,
                'contact_person_phone_number' => '080' . $fake->randomNumber(8, true),
                'created_at' => $fake->dateTimeThisMonth()->format('Y-m-d H:i:s')
                ,
            ]);
        }
    }
}
