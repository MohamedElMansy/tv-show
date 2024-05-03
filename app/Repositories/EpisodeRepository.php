<?php

namespace App\Repositories;


use App\Models\Episode;
use Illuminate\Database\Eloquent\Builder;

class EpisodeRepository
{
    public function get()
    {
        return $this->initateQuery()->with('show')->latest('created_at')->paginate(6);
    }

    public function search($searchQuery)
    {
        return $this->initateQuery()->where('title', 'LIKE', '%' . $searchQuery . '%')->get();
    }

    protected function initateQuery(): Builder|Episode
    {
        return (new Episode())->newModelQuery();
    }
}
