<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('branches')->insert(
            [

                ['name' => 'فرع القاهرة', 'phone' => '01012345678', 'address' => 'شارع التحرير، القاهرة', 'governorate_id' => 1],
                ['name' => 'فرع الجيزة', 'phone' => '01098765432', 'address' => 'شارع الهرم، الجيزة', 'governorate_id' => 2],
                ['name' => 'فرع الإسكندرية', 'phone' => '01234567890', 'address' => 'محطة الرمل، الإسكندرية', 'governorate_id' => 3],
                ['name' => 'فرع المنصورة', 'phone' => '01122334455', 'address' => 'شارع الجمهورية، المنصورة', 'governorate_id' => 4],
                ['name' => 'فرع أسيوط', 'phone' => '01055667788', 'address' => 'وسط البلد، أسيوط', 'governorate_id' => 5],
                ['name' => 'فرع سوهاج', 'phone' => '01578945612', 'address' => 'كورنيش النيل، سوهاج', 'governorate_id' => 6],
                ['name' => 'فرع الإسماعيلية', 'phone' => '01233445566', 'address' => 'شارع الثلاثيني، الإسماعيلية', 'governorate_id' => 7],
                ['name' => 'فرع بورسعيد', 'phone' => '01099887766', 'address' => 'حي الشرق، بورسعيد', 'governorate_id' => 8],
                ['name' => 'فرع الأقصر', 'phone' => '01155667788', 'address' => 'طريق الكورنيش، الأقصر', 'governorate_id' => 9],
                ['name' => 'فرع أسوان', 'phone' => '01266778899', 'address' => 'حي النصر، أسوان', 'governorate_id' => 10],
            ]
        );
    }
}
