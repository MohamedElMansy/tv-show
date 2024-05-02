<?php

namespace App\Services\Show;

use App\Repositories\ShowRepository;

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

    public function getShowById($id)
    {
        return $this->showRepository->getById($id);
    }
}
