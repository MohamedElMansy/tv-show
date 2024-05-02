<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'episode_number',
        'time',
        'thumbnail',
        'duration',
        'video'
    ];

    public function show()
    {
        return $this->belongsTo(Show::class);
    }
}
