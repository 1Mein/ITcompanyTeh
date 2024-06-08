<?php

namespace App\Http\Controllers\Api\Film;

use App\Http\Controllers\Controller;
use App\Models\Film;

class IndexController extends Controller
{
    public function __invoke()
    {
        $films = Film::where('status', 1)->with('genres')->paginate(10);
        return response()->json($films);
    }
}
