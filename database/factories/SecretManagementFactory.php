<?php

namespace Database\Factories;

use App\Models\SecretManagement;
use Illuminate\Database\Eloquent\Factories\Factory;

class SecretManagementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SecretManagement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,5),
            'project_id' => $this->faker->numberBetween(1,5)
        ];
    }
}
