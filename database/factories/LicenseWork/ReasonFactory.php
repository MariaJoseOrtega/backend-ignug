<?php

namespace Database\Factories\LicenseWork;

use App\Models\LicenseWork\Reason;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReasonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reason::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->randomElement(['License','Permission']),
            'description_one'=>$this->faker->text(),
            'description_two'=>$this->faker->text(),
            'discountable_holidays'=>$this->faker->boolean(),
            'days_min'=>$this->faker->randomDigit(),
            'days_max'=>$this->faker->randomDigit(),
        ];
    }
}
