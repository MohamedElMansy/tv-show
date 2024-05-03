<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Show;
use App\Services\Episode\EpisodeService;
use App\Services\Show\ShowService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchQuery = $request->input('q');

        $shows = (new ShowService())->searchShow($searchQuery);
        $episodes = (new EpisodeService())->searchEpisode($searchQuery);

        $results = $shows->concat($episodes);

        return view('search', ['results' => $results]);
    }
}
