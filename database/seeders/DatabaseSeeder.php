<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(100)->create();
        
        \App\Models\User::create([
            "name" => "Admin",
            "username" => "a",
            "email" => "admin@admin.com",
            "password" => bcrypt('a'),
        ]);
    }


}
