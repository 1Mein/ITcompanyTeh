<?php

namespace App\Http\Controllers\Film;

use App\Models\Film;

class DeleteController extends BaseController
{
    public function __invoke(Film $film)
    {
        $film->delete();

        return response()->json(['action' => 'delete', 'code' => '200', 'film_id' => $film->id]);
    }
}
