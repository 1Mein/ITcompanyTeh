<?php

namespace App\Http\Service;

use App\Models\Film;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FilmService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();


            $genreIds = $data['genre_ids'];
            unset($data['genre_ids']);
            $data['status'] = 0;

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('posters', $data['image']);
            }


            $film = Film::firstOrCreate($data);

            $film->genres()->attach($genreIds);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }


    public function update($data, $film)
    {
        try {
            DB::beginTransaction();
            $genreIds = $data['genre_ids'];
            unset($data['genre_ids']);


            if (isset($data['image'])) {
                Storage::disk('public')->delete('posters', $data['image']);
                $data['image'] = Storage::disk('public')->put('posters', $data['image']);
            }


            $film->update($data);

            $film->genres()->sync($genreIds);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
