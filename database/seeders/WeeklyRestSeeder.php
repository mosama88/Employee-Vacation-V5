<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WeeklyRestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('weekly_rests')->insert(
            [
                ['name' => 'السبت'],
                ['name' => 'الأحد'],
                ['name' => 'الإثنين'],
                ['name' => 'الثلاثاء'],
                ['name' => 'الأربعاء'],
                ['name' => 'الخميس'],
                ['name' => 'الجمعة'],
            ]
        );
    }
}