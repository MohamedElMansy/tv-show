<?php

namespace App\Services\Episode;

use App\Repositories\ShowRepository;

class EpisodeService
{
    protected $showRepository;
    public function __construct()
    {
        $this->showRepository= new ShowRepository();
    }

    public function getEpisode($showId ,$episodeNumber)
    {
        $show = $this->showRepository->getById($showId);
        if (!$show || !is_numeric($episodeNumber))
            return false;

        $episode = $show->episodes()->orderBy('created_at')->skip($episodeNumber - 1)->first();
        return $episode;
    }

}
