<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;
use App\Models\Genre;

class StoreController extends Controller
{
    public function __invoke(GenreRequest $request)
    {
        $data = $request->validated();
        Genre::create($data);
        return redirect()->route('genre.index');
    }
}
