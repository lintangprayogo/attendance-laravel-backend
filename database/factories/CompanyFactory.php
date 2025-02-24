<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'address'=>$this->faker->address(),
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
            'radius_km' => $this->faker->randomFloat(1, 1, 10), // Example: radius between 1 and 10 km
            'time_in' => $this->faker->time('H:i'), // Example: time in 24-hour format
            'time_out' => $this->faker->time('H:i'),
        ];
    }
}
