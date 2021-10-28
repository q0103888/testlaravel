<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'made' => $this->faker->text(),
            'carname' => $this->faker->text(),
            'makeyear' => $this->faker->text(),
            'price' => $this->faker->text(),
            'carmodel' => $this->faker->text(),
            'appearance' => $this->faker->text(),
            'image' => $this->faker->imageUrl(320, 240, 'cats'),
            'user_id' => 1,
        ];
    }
}
