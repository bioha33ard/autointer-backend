<?php

namespace Database\Factories;

use App\Models\Order;
use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    protected array $car_body =
        [
            'sedan',
            'off-road',
            'hatch-back',
            'universal',
            'coupe',
            'minivan',
            'microbus',
            'lift-back',
            'van',
            'pickup',
            'cabriolet'
        ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new Fakecar($this->faker));
        $vehicle = $this->faker->vehicleArray();
        return [
            'full_name' => $this->faker->firstName.' '.$this->faker->lastName,
            'contacts' => $this->faker->phoneNumber,
            'brand' => $vehicle['brand'],
            'model' => $vehicle['model'],
            'year' => $this->faker->biasedNumberBetween(1990, date('Y'), 'sqrt'),
            'engine_type' => $this->faker->randomElement(['diesel','petrol','hybrid','electric-engine']),
            'engine_capacity' => rand(200, 1000) / 10,
            'transmission' => $this->faker->randomElement(['automatic','mechanic','variate','robot']),
            'drive' => $this->faker->randomElement(['forward','backward','full']),
            'horse_power' => rand(350,650),
            'car_body' => $this->faker->randomElement($this->car_body),
            'wheel' => $this->faker->randomElement(['right','left']),
            'quality' => $this->faker->randomElement(['new','used','with-damage','restored']),
        ];
    }
}
