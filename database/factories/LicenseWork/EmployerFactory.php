<?php

namespace Database\Factories\LicenseWork;

use App\Models\LicenseWork\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'logo'=>$this->faker->word(),
            'department'=>$this->faker->word(),
            'coordination'=>$this->faker->word(),
            'unit'=>$this->faker->word(),
            'approval_name'=>$this->faker->name(),
            'register_name'=>$this->faker->name(),
        ];
    }
}
