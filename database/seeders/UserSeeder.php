<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            "name"=> "EL MOT",
            'email' => "lyelmot@gmail.com",
            'password' => Hash::make(md5("qwertyuiop")),
            "token" => md5("qwertyuiop"),
            'status' => "active",
            'role' => "admin",
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
