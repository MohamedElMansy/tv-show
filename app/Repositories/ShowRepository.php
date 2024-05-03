<?php

namespace App\Repositories;


use App\Models\Show;
use Illuminate\Database\Eloquent\Builder;

class ShowRepository
{
    public function get()
    {
        return $this->initateQuery()->paginate(6);
    }

    public function getById($id)
    {
        return $this->initateQuery()->find($id);
    }

    public function getRandomShows()
    {
        return $this->initateQuery()->inRandomOrder()->limit(5)->get();
    }

    public function search($searchQuery)
    {
        return $this->initateQuery()->where('title', 'LIKE', '%' . $searchQuery . '%')->get();
    }

    protected function initateQuery(): Builder|Show
    {
        return (new Show())->newModelQuery();
    }
}
