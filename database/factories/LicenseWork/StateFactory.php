<?php

namespace Database\Factories\LicenseWork;

use App\Models\LicenseWork\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class StateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = State::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->randomElement(['NO-APPROVED','APPROVED','PRE-APPROVED','SAVED']),
            'code'=>$this->faker->randomElement(['NO-APPROVED','APPROVED','PRE-APPROVED','SAVED'])
        ];
    }
}
