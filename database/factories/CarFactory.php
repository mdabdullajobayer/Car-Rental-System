<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'brand' => $this->faker->company(),
            'model' => $this->faker->word(),
            'year' => $this->faker->year(),
            'car_type' => $this->faker->randomElement(['SUV', 'Sedan', 'Hatchback', 'Truck']),
            'daily_rent_price' => $this->faker->randomFloat(2, 50, 500),
            'availability' => $this->faker->boolean(),
            'image' => 'uploads/car.webp',
        ];
    }
}
