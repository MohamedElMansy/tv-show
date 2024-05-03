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
    private $showService;
    public function __construct()
    {
        $this->showService = new ShowService();
    }

    public function index()
    {
        try{
            $shows = $this->showService->getShows();
            return view('shows.index', compact('shows'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return ResponseHelper::errorResponse($exception->getMessage());
        }
    }

    public function getTopShows()
    {
        try{
            $shows = $this->showService->getRandomShows();
            return view('shows.top_rated', compact('shows'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return ResponseHelper::errorResponse($exception->getMessage());
        }
    }

    public function show(Request $request)
    {
        try{
            $show = $this->showService->getShowById($request->id);
            if ($show)
                return view('shows.details', compact('show'));
            else
                return view('errors.not_found');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return ResponseHelper::errorResponse($exception->getMessage());
        }
    }

    public function followShow(Request $request)
    {
        try{
            $this->showService->followShow($request->id);
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return ResponseHelper::errorResponse($exception->getMessage());
        }
    }

    public function unfollowShow(Request $request)
    {
        try{
            $this->showService->unFollowShow($request->id);
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return ResponseHelper::errorResponse($exception->getMessage());
        }
    }
}
