<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use App\Models\Genre;

class DeleteController extends Controller
{
    public function __invoke(Genre $genre)
    {
        $genre->delete();
        return response()->json(['action' => 'delete', 'code' => '200', 'genre_id' => $genre->id]);
    }
}
