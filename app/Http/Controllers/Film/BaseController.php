<?php

namespace App\Http\Controllers\Film;

use App\Http\Controllers\Controller;
use App\Http\Service\FilmService;

class BaseController extends Controller
{
    public $service;

    public function __construct(FilmService $service)
    {
        $this->service = $service;
    }
}
