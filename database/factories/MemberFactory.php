<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->word,
        'role' => $this->faker->word,
        'patrol_code' => $this->faker->randomDigitNotNull,
        'patrol_role' => $this->faker->word,
        'bs_id' => $this->faker->word,
        'name' => $this->faker->word,
        'furigana' => $this->faker->word,
        'grade' => $this->faker->word,
        'gender' => $this->faker->word,
        'birthday' => $this->faker->word,
        'religion' => $this->faker->word,
        'religion_sect' => $this->faker->word,
        'email' => $this->faker->word,
        'phone' => $this->faker->word,
        'cell_phone' => $this->faker->word,
        'org_dan_name' => $this->faker->word,
        'org_dan_number' => $this->faker->word,
        'org_group' => $this->faker->word,
        'org_patrol' => $this->faker->word,
        'org_role' => $this->faker->word,
        'training_record' => $this->faker->word,
        'uuid' => $this->faker->word,
        'sfh' => $this->faker->word,
        'health_check' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
