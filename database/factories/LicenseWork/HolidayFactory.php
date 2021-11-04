<?php

namespace Database\Factories\LicenseWork;

use App\Models\LicenseWork\Holiday;
use Illuminate\Database\Eloquent\Factories\Factory;

class HolidayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Holiday::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number_days'=>$this->faker->randomNumber(2,false),
            'year'=>$this->faker->year(),
        ];
    }
}
