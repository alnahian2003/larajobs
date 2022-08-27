<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'tags' => 'laravel,development,remote,backend',
            'company' => $this->faker->company(),
            'location' => $this->faker->city(),
            'email' => $this->faker->email(),
            'website' => $this->faker->url(),
            'description' => $this->faker->paragraph(5),
        ];
    }
}
