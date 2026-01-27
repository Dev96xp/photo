<?php

namespace Database\Factories;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->words($nb = 3, $asText = true);
        return [
            'code' => $this->faker->unique()->numerify('P####-####'),
            'name' => $name,
            'description' => $this->faker->paragraph(),
            'note' => $this->faker->optional()->paragraph(),
            'status' => 'ACTIVE',
            'owner' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'company' => $this->faker->company(),
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'zip' => $this->faker->postcode(),
            'email' => $this->faker->unique()->safeEmail(),
            'time' => $this->faker->dateTimeThisYear()->format('Y-m-d H:i:s'),
        ];
    }
}
