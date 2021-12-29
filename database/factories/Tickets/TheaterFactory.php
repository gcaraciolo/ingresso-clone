<?php

namespace Database\Factories\Tickets;

use App\Tickets\City;
use App\Tickets\Theater;
use Illuminate\Database\Eloquent\Factories\Factory;

class TheaterFactory extends Factory
{
    protected $model = Theater::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'city_id' => City::factory()
        ];
    }
}
