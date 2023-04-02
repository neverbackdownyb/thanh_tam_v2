<?php

namespace Database\Factories;

use App\Models\Treatments;
use Illuminate\Database\Eloquent\Factories\Factory;

class TreatmentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Treatments::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'diagnosis_id' => $this->faker->randomDigitNotNull,
        'cure' => $this->faker->randomDigitNotNull,
        'unit_price' => $this->faker->randomDigitNotNull,
        'quality' => $this->faker->randomDigitNotNull,
        'discount' => $this->faker->randomDigitNotNull,
        'total_amount' => $this->faker->randomDigitNotNull,
        'note' => $this->faker->randomDigitNotNull,
        'status' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
