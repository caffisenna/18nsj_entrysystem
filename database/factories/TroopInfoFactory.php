<?php

namespace Database\Factories;

use App\Models\TroopInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class TroopInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TroopInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->word,
        'pref' => $this->faker->word,
        'district' => $this->faker->word,
        'troop_number' => $this->faker->word,
        'person_in_charge_name' => $this->faker->word,
        'person_in_charge_position' => $this->faker->word,
        'person_in_charge_bsid' => $this->faker->word,
        'person_in_charge_phone' => $this->faker->word,
        'person_in_charge_cellphone' => $this->faker->word,
        'person_in_charge_email' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
