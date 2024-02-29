<?php

namespace Database\Factories;

use App\Models\Endpoint;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endpoint>
 */
class EndpointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'url' => $this->faker->url,
        ];
    }

    /**
     * Configure model factory
     */
    public function configure()
    {
        return $this->afterCreating(function (Endpoint $endpoint) {
            for ($i = 0; $i<3; $i++) {
                $mapping = new \App\Models\Mapping([
                    'source_field' => $this->faker->word,
                    'target_field' => $this->faker->word,
                ]);
                $endpoint->mappings()->save($mapping);
            }
        });
    }
}
