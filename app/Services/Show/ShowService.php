<?php

namespace App\Services\Show;

use App\Repositories\ShowRepository;
use Illuminate\Support\Facades\Auth;

class ShowService
{
    protected $showRepository;
    public function __construct()
    {
        $this->showRepository= new ShowRepository();
    }

    public function getShows()
    {
        return $this->showRepository->get();
    }

    public function getRandomShows()
    {
        return $this->showRepository->getRandomShows();
    }

    public function searchShow($searchQuery)
    {
        return $this->showRepository->search($searchQuery);
    }

    public function getShowById($id)
    {
        return $this->showRepository->getById($id);
    }

    public function followShow($id)
    {
        $show = $this->getShowById($id);
        if ($show){
            Auth::user()->follows()->attach($show);
        }
    }
    public function unFollowShow($id)
    {
        $show = $this->getShowById($id);
        if ($show){
            Auth::user()->follows()->detach($show);
        }
    }
}
