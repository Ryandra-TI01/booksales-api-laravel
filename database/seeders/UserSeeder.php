<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                "name" => "Admin",
                "email" => "admin@gmail.com",
                "password" => bcrypt("password"),
                "role" => "admin"
            ],
            [
                "name" => "User",
                "email" => "user@gmail.com",
                "password" => bcrypt("password"),
                "role" => "customer"
            ],
            [
                "name" => "user1",
                "email" => "user1@gmail.com",
                "password" => bcrypt("password"),
                "role" => "customer"
            ],
            [
                "name" => "user2",
                "email" => "user2@gmail.com",
                "password" => bcrypt("password"),
                "role" => "customer"
            ],
            [
                "name" => "user3",
                "email" => "user3@gmail.com",
                "password" => bcrypt("password"),
                "role" => "customer"
            ]
        ]);
    }
}
