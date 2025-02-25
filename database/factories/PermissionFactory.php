<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1, // Creates a related user if needed
            'date_permission' => $this->faker->date(),
            'reason' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(), // Generates a fake image URL
            'is_approved' => $this->faker->boolean(),
        ];
    }

}
