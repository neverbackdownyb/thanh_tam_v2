<?php

namespace Database\Factories;

use App\Models\Partients;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartientsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partients::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'phone' => $this->faker->word,
        'name' => $this->faker->word,
        'status' => $this->faker->word,
        'avatar' => $this->faker->word,
        'birth_day' => $this->faker->randomDigitNotNull,
        'province_id' => $this->faker->randomDigitNotNull,
        'district' => $this->faker->randomDigitNotNull,
        'ward' => $this->faker->randomDigitNotNull,
        'note' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
