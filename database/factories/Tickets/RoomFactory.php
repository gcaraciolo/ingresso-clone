<?php

namespace Database\Factories\Tickets;

use App\Tickets\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => __('Sala') . ' ' . $this->faker->randomDigit(),
            'total_seats' => 32
        ];
    }
}
