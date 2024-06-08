<?php

namespace App\Http\Controllers\Film;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Genre;

class EditController extends Controller
{
    public function __invoke(Film $film)
    {
        $genres = Genre::all();
        return view('film.edit',compact(['film','genres']));
    }
}
