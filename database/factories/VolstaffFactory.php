<?php

namespace Database\Factories;

use App\Models\Volstaff;
use Illuminate\Database\Eloquent\Factories\Factory;

class VolstaffFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Volstaff::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->word,
        'bs_id' => $this->faker->word,
        'name' => $this->faker->word,
        'furigana' => $this->faker->word,
        'gender' => $this->faker->word,
        'birthday' => $this->faker->word,
        'email' => $this->faker->word,
        'phone' => $this->faker->word,
        'cell_phone' => $this->faker->word,
        'org_dan_name' => $this->faker->word,
        'org_dan_number' => $this->faker->word,
        'org_group' => $this->faker->word,
        'org_role' => $this->faker->word,
        'district_role' => $this->faker->word,
        'training_record' => $this->faker->word,
        'uuid' => $this->faker->word,
        'sfh' => $this->faker->word,
        'health_check' => $this->faker->word,
        'car_number' => $this->faker->word,
        'car_type' => $this->faker->word,
        'how_to_join' => $this->faker->word,
        'camp_area' => $this->faker->word,
        'job_department' => $this->faker->word,
        'memo' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
