<?php

namespace App\Http\Controllers\Api\Genre;

use App\Http\Controllers\Controller;
use App\Models\Genre;

class ShowController extends Controller
{
    public function __invoke(Genre $genre)
    {
        $films = $genre->films()->with('genres')->paginate(10);
        return response()->json($films);
    }
}
