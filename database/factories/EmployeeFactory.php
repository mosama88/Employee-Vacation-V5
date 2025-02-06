<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\WeeklyRest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class EmployeeFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'employee_code' => fake()->unique()->numerify('EMP###'),
            'name' => fake()->name(),
            'username' => fake()->userName(),
            'password' => static::$password ??= Hash::make('password'),
            'mobile' => fake()->phoneNumber(),
            'alt_mobile' => fake()->phoneNumber(),
            'birth_date' => fake()->date(),
            'start_work' => fake()->date(),
            'leave_balance' => fake()->numberBetween(10, 30),
            'branch_id' => Branch::inRandomOrder()->first()?->id ?? Branch::factory()->create()->id,
            'weekly_rest_id' => WeeklyRest::inRandomOrder()->first()?->id ?? WeeklyRest::factory()->create()->id,
            'created_by' => 1, // مثال: المستخدم الأول هو الذي أنشأه
            'updated_by' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}