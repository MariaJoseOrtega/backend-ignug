<?php

namespace Database\Factories\LicenseWork;

use App\Models\LicenseWork\Application;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Application::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date_started_at'=>$this->faker->date(),
            'date_ended_at'=>$this->faker->date(),
            'time_started_at'=>$this->faker->time(),
            'time_ended_at'=>$this->faker->time(),
            'observations'=>$this->faker->text(),
        ];
    }
}
