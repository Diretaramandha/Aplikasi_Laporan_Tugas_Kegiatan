<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            "name"=> "Direta",
            "username"=> "direta",
            "email"=> "direta@gmail.com",
            "nohp"=> "0899642344",
            "address"=> "Tasikmalaya,Singaparna",
            "level"=> "admin",
            "password"=> bcrypt("12"),
        ]);
        User::create([
            "name"=> "Geusan",
            "username"=> "direta",
            "email"=> "direta2@gmail.com",
            "nohp"=> "0899642344",
            "address"=> "Tasikmalaya,Singaparna",
            "level"=> "member",
            "password"=> bcrypt("12"),
        ]);
        User::create([
            "name"=> "Adit",
            "username"=> "direta",
            "email"=> "direta3@gmail.com",
            "nohp"=> "0899642344",
            "address"=> "Tasikmalaya,Singaparna",
            "level"=> "member",
            "password"=> bcrypt("12"),
        ]);
        User::create([
            "name"=> "Mufti",
            "username"=> "direta",
            "email"=> "direta4@gmail.com",
            "nohp"=> "0899642344",
            "address"=> "Tasikmalaya,Singaparna",
            "level"=> "member",
            "password"=> bcrypt("12"),
        ]);
    }
}
