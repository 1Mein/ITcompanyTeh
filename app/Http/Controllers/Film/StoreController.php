<?php

namespace App\Http\Controllers\Film;

use App\Http\Requests\FilmRequest;

class StoreController extends BaseController
{
    public function __invoke(FilmRequest $request)
    {

        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('film.index');
    }
}
