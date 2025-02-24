<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Company::factory(1)->create();

        User::factory()->create([
            "name" => "Lintang",
            "email" => "lintangprayogo12@gmail.com",
            "password" => Hash::make("12345678")
        ]);


        $this->call([
            UserSeeder::class,
            AttendanceSeeder::class,
            PermissionSeeder::class,
        ]);
    }
}
