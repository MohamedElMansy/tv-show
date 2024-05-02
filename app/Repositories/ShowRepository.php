<?php

namespace App\Repositories;


use App\Models\Show;
use Illuminate\Database\Eloquent\Builder;

class ShowRepository
{
    public function get()
    {
        return Show::paginate(6);
    }

    public function getById($id)
    {
        return $this->initateQuery()->find($id);
    }

    protected function initateQuery(): Builder|Show
    {
        return (new Show())->newModelQuery();
    }
}
