<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $word = $this->faker->word;

    $sentence = $this->faker->sentence();

    $description = $this->faker->sentence() . $this->faker->sentence() . $this->faker->sentence() . $this->faker->sentence() . $this->faker->sentence() . $this->faker->sentence();

    $content = '<p>' . $this->faker->paragraph() . '</p>' . '<p>' . $this->faker->paragraph() . '</p>' . '<p>' . $this->faker->paragraph() . '</p>' . '<p>' . $this->faker->paragraph() . '</p>' . '<p>' . $this->faker->paragraph() . '</p>' . '<p>' . $this->faker->paragraph() . '</p>' . '<p>' . $this->faker->paragraph() . '</p>' . '<p>' . $this->faker->paragraph() . '</p>' . '<p>' . $this->faker->paragraph() . '</p>' . '<p>' . $this->faker->paragraph() . '</p>' . '<p>' . $this->faker->paragraph() . '</p>' . '<p>' . $this->faker->paragraph() . '</p>' . '<p>' . $this->faker->paragraph() . '</p>';

    return [
      'user_id' => $this->faker->randomElement([1]),
      'category_id' => $this->faker->randomElement([1]),
      'title' => $this->faker->catchPhrase,
      'description' => $description,
      'content' => $content,
      'markdown' => '# header',
      'slug' => $this->faker->word . '_' . $this->faker->word . '-' . $this->faker->word,
    ];
  }
}
