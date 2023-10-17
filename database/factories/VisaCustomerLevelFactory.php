<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class VisaCustomerLevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name',
            // 'status',
            // 'is_default',
            // 'min_success_visa_per_month',
            // 'expire_days',
            // 'price_config',
            'name' => 'Customer',
            'status' => 'active',
            'is_default' => 1,
            'min_success_visa_per_month' => 40,
            'expire_days' => 0,
            'price_config' => json_decode('[{"label":"Standard processing (5-7 working days)","value":"7","working_hours":56,"cut_off":["08:00","09:00","09:30"],"price_1":50,"price_2":85,"price_3":85,"price_4":50}]')
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
