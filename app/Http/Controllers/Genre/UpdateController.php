<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;
use App\Models\Genre;

class UpdateController extends Controller
{
    public function __invoke(GenreRequest $request, Genre $genre)
    {
        $data = $request->validated();
        $genre->update($data);
        return redirect()->route('genre.index');
    }
}
