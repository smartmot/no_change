<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExchangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("settings")->insert([
            [
                "name" => "riel_usd",
                "group" => "exchange_rate",
                "value" => 4100
            ],
            [
                "name" => "bath_usd",
                "group" => "exchange_rate",
                "value" => 32.97
            ],
            [
                "name" => "riel_bath",
                "group" => "exchange_rate",
                "value" => 125.56
            ],
        ]);
    }
}
