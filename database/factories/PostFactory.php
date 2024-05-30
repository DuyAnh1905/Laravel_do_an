<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Post::class;
    public function definition()
    {
        return [
            'title' => $this -> faker -> name(),
            'slug_truyen' => $this -> faker -> name(),
            'is_active' => true,
            'slide_url' => $this->faker->imageUrl(450, 300),
            'content' => $this->faker->sentence(),
            'tatgia' => $this->faker->name(),
            'theloai' => $this->faker->name(),
            'NXB' => $this->faker->name(),
            'category_id' => random_int(1,10),
        ];
    }
}
