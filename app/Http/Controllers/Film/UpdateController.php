<?php

namespace App\Http\Controllers\Film;

use App\Http\Requests\FilmRequest;
use App\Models\Film;

class UpdateController extends BaseController
{
    public function __invoke(FilmRequest $request, Film $film)
    {
        $data = $request->validated();
        $this->service->update($data,$film);
        return redirect()->route('film.index');
    }
}
