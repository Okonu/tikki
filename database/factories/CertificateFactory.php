<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificate>
 */
class CertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner_name' => $this->faker->name,
            'certificate_number' => $this->faker->unique()->randomNumber(8),
            'issuing_date' => $this->faker->date('Y-m-d', '-5 years'),
            'issuing_institution' => $this->faker->company,
            'expiration_date' => $this->faker->date('Y-m-d', '+5 years'),
        ];
    }
}
