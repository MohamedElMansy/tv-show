<?php

namespace App\Http\Controllers;

use App\Services\Episode\EpisodeService;

class HomeController extends Controller
{

    public function index()
    {
        $episodes = (new EpisodeService())->getEpisodes();

        return view('index', compact('episodes'));
    }
}
