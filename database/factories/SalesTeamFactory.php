<?php

namespace Database\Factories;

use App\Models\SalesTeam;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalesTeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SalesTeam::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // date()
            'manager_id' => 1,
            'fullname' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'telephone' => $this->faker->e164PhoneNumber(),
            'route_id' => rand(1, 10),
            'joined_at' => $this->faker->date(),
            'comment' => $this->faker->sentence($nb_words=10)
        ];
    }
}
