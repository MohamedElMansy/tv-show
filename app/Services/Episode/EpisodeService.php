<?php

namespace App\Services\Episode;

use App\Repositories\EpisodeRepository;
use App\Repositories\ShowRepository;

class EpisodeService
{
    protected $showRepository;
    protected $episodeRepository;
    public function __construct()
    {
        $this->showRepository= new ShowRepository();
        $this->episodeRepository = new EpisodeRepository();
    }

    public function getEpisode($showId ,$episodeNumber)
    {
        $show = $this->showRepository->getById($showId);
        if (!$show || !is_numeric($episodeNumber))
            return false;

        $episode = $show->episodes()->where('episode_number' , $episodeNumber)->first();
        return $episode;
    }

     public function getEpisodes()
     {
         return $this->episodeRepository->get();
     }

    public function searchEpisode($searchQuery)
    {
        return $this->episodeRepository->search($searchQuery);
    }

}
