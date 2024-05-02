<?php

namespace App\Http\Controllers\Show;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Show;
use App\Services\Episode\EpisodeService;
use App\Services\Show\ShowService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShowController extends Controller
{
    public function index()
    {
        try{
            $shows = (new ShowService())->getShows();
            return view('shows.index', compact('shows'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return ResponseHelper::errorResponse($exception->getMessage());
        }
    }

    public function show(Request $request)
    {
        try{
            $show = (new ShowService())->getShowById($request->id);
            if ($show)
                return view('shows.details', compact('show'));
            else
                return view('errors.not_found');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return ResponseHelper::errorResponse($exception->getMessage());
        }
    }

    public function getEpisode(Request $request)
    {
        try{
            $episode = (new EpisodeService())->getEpisode($request->showId, $request->episodeNumber);
            if ($episode)
                return view('episodes.details', compact('episode'));
            else
                return view('errors.not_found');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return ResponseHelper::errorResponse($exception->getMessage());
        }
    }
}
