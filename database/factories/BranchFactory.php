<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->company(), // اسم الفرع (يمكنك تعديله ليكون أكثر واقعية)
            'phone' => fake()->unique()->phoneNumber(), // رقم هاتف فريد
            'address' => fake()->address(), // عنوان الفرع
            'governorate_id' => fake()->numberBetween(1, 10), // معرّف المحافظة (يفترض وجود محافظات بين 1 و 10)
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}