<?php

namespace Database\Seeders;

use App\Models\Episode;
use App\Models\Show;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $shows = Show::all();

        foreach ($shows as $show) {
            Episode::factory()
                ->count(rand(5, 10)) // Generate 5 to 10 random episodes for each show
                ->create(['show_id' => $show->id]);
        }
    }
}
