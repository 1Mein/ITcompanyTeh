<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use App\Models\Genre;

class EditController extends Controller
{
    public function __invoke(Genre $genre)
    {
        return view('genre.edit', compact(['genre']));
    }
}
