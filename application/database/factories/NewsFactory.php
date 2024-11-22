<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => Str::slug($this->faker->sentence),
            'content' => $this->faker->paragraph,
            'url_img' => $this->faker->paragraph,
            'category_id' => Category::factory(),
        ];
    }
}
