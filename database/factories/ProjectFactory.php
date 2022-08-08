<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,5),
            'project_name' => $this->faker->realText(10),
            'explanation' => $this->faker->realText(30),
            'secret_flag' => 0,
            'mst_genre_id' => $this->faker->numberBetween(1,5)
        ];
    }
}
