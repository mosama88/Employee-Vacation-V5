<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('job_grades')->insert(
            [
                ['name' => 'الدرجه الأولى'],
                ['name' => 'الدرجه الثانية'],
                ['name' => 'الدرجه الثالثه'],
                ['name' => 'الدرجه الرابعه'],
                ['name' => 'الدرجه الخامسة'],
                ['name' => 'الدرجه السادسه'],
            ]
        );
    }
}