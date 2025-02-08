<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Employee;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Mohamed Osama',
            'email' => 'user@admin.com',
        ]);


        Admin::factory()->create([
            'name' => 'Mohamed Osama Admin',
            'username' => 'admin',
        ]);


    


        $this->call([
            GovernorateSeeder::class,
            WeeklyRestSeeder::class,
            JobGradeSeeder::class,
            BranchSeeder::class,
            EmployeeSeeder::class,
        ]);
    }
}