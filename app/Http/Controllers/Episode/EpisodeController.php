<?php

namespace App\Http\Controllers\Episode;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Show;
use App\Services\Episode\EpisodeService;
use App\Services\Show\ShowService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EpisodeController extends Controller
{
    private $episodeService;
    public function __construct()
    {
        $this->episodeService = new EpisodeService();
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


    public function likeEpisode(Request $request)
    {
        try{
            $this->episodeService->likeEpisode($request->showId, $request->episodeNumber);
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return ResponseHelper::errorResponse($exception->getMessage());
        }
    }

    public function dislikeEpisode(Request $request)
    {
        try{
            $this->episodeService->dislikeEpisode($request->showId, $request->episodeNumber);
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return ResponseHelper::errorResponse($exception->getMessage());
        }
    }
}
