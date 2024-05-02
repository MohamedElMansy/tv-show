<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Episode>
 */
class EpisodeFactory extends Factory
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
        $formattedTime = $day . ' @ ' . $time;

        $coverPath = public_path('img/covers');
        $coverFiles = scandir($coverPath);
        $coverFiles = array_diff($coverFiles, ['.', '..']);

        $videos = ["http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4",
            "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerJoyrides.mp4",
            "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4",
            "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4"];

        return [
            'title' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'description' => $this->faker->text(200),
            'time' => $formattedTime,
            'thumbnail' => 'img/covers/' . $this->faker->randomElement($coverFiles),
            'duration' => $this->faker->numberBetween(20, 59),
            'video' => $this->faker->randomElement($videos),
        ];
    }
}
