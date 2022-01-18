<?php

namespace Database\Factories;

use App\Models\DistrictExec;
use Illuminate\Database\Eloquent\Factories\Factory;

class DistrictExecFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DistrictExec::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'district_name' => $this->faker->word,
        'chairman_name' => $this->faker->word,
        'chairman_phone' => $this->faker->word,
        'chairman_email' => $this->faker->word,
        'commi_name' => $this->faker->word,
        'commi_phone' => $this->faker->word,
        'commi_email' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
