<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 1000),
            'restaurant_id' => $this->faker->numberBetween(1, 1000),
            'total_price' => $this->faker->randomFloat(2, 1, 1000),
            'items' => "{\"items\": [1, 3, 4]}",
            'delivered' => false,
            'address' => $this->faker->streetAddress,
            'zip' => $this->faker->postcode,
            'city' => $this->faker->city,
            'instructions' => $this->faker->paragraph(3, true),
        ];
    }
}
