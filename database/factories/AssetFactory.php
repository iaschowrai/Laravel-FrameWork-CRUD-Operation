<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\Asset;
use App\Models\Person;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
        protected $model = Asset::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'value' => $this->faker->randomFloat(2, 10, 1000),
            'purchased' => Carbon::now()->subDays(fake()->numberBetween(1,365)),
            'assigned' => 1,
            'owner_id' => Person::all()->random()->id
            
        ];
    }
}
