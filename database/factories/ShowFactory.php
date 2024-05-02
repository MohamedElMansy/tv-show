<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Show>
 */
class ShowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday'];

        $time = $this->faker->time('H:i');
        $day = $this->faker->randomElement($daysOfWeek);
        $toDay=$this->faker->randomElement($daysOfWeek);
        $formattedTime = $day .' to ' .$toDay. ' @ ' . $time;

        $coverPath = public_path('img/covers');
        $coverFiles = scandir($coverPath);
        $coverFiles = array_diff($coverFiles, ['.', '..']);

        return [
            'title' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'description' => $this->faker->text(200),
            'time' => $formattedTime,
            'cover' => 'img/covers/' . $this->faker->randomElement($coverFiles),
        ];
    }
}
