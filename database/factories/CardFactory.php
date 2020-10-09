<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Card::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'score' => random_int(100,10000),
            'image' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'category_id' => Category::factory()
        ];
    }
}
