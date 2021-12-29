<?php

namespace Database\Factories\Tickets;

use App\Tickets\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    protected $model = Movie::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'image_path' => $this->faker->imageUrl()
        ];
    }
}
