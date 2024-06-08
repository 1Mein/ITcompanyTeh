<?php

namespace App\Http\Controllers\Film;

use App\Models\Film;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $films = Film::with('genres')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($film) {
                $film->statusLabel = $film->getStatus();
                return $film;
        });
        return view('film.index', compact(['films']));
    }
}
