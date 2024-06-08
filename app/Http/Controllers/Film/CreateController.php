<?php

namespace App\Http\Controllers\Film;

use App\Http\Controllers\Controller;
use App\Models\Genre;

class CreateController extends Controller
{
    public function __invoke()
    {
        $genres = Genre::all();
        return view('film.create',compact(['genres']));
    }
}
