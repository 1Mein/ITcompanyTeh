<?php

namespace App\Http\Controllers\Api\Film;

use App\Http\Controllers\Controller;
use App\Models\Film;

class ShowController extends Controller
{
    public function __invoke(Film $film)
    {
        $film->load('genres');
        return response()->json($film);
    }
}
