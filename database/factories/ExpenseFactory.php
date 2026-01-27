<?php

namespace Database\Factories;

use App\Models\Expense;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $vendor = Vendor::pluck('id')->toArray();
        $name = $this->faker->words($nb = 3, $asText = true);

        return [
             'name'=>$name,
             'description' => $this->faker->paragraph(),
             'note' => $this->faker->optional()->paragraph(),
             'cost' => $this->faker->randomFloat(2, 10, 1000),
             'cost2' => $this->faker->randomFloat(2, 10, 1000),
             'sign' => 'none',
             'discount' => $this->faker->randomFloat(2, 0, 100),
             'status'=> Expense::ACTIVO,
             'type' => 'none',
             'aux' => 'none',
             'aux2' => 'none',
             'executive_id' => 1,
             'vendor_id'=>$this->faker->randomElement([2,3]),
             'project_id'=>$this->faker->randomElement([1,2,3])

        ];
    }
}
