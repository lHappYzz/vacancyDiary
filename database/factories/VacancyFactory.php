<?php

namespace Database\Factories;

use App\Models\Status;
use App\Models\vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacancyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = vacancy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle,
            'position' => 'PHP dev',
            'company_name' => $this->faker->company,
            'status_id' => Status::all()->random()->id,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
