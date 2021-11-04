<?php

namespace Database\Factories\LicenseWork;

use App\Models\LicenseWork\Form;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Form::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code'=>$this->faker->numerify(),
            'description'=>$this->faker->text(),
            'regime'=>$this->faker->numerify(),
            'days_const'=>$this->faker->randomFloat(2),
            'approved_level'=>$this->faker->randomDigit(),
            'state'=>$this->faker->boolean(),
        ];
    }
}
