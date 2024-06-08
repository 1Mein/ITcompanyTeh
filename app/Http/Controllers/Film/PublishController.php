<?php

namespace App\Http\Controllers\Film;

use App\Models\Film;

class PublishController extends BaseController
{
    public function __invoke(Film $film)
    {
        $film->update(['status' => 1]);

        return response()->json(['action' => 'delete', 'code' => '200', 'film_id' => $film->id, 'status_label' => $film->getStatus()]);
    }
}
