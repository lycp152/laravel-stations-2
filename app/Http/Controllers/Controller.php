<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Movie;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function movies()
    {
        $movies = Movie::all();
        return view('movies', ['movies' => $movies]);
    }

    public function adminMovies()
    {
        $adminMovies = Movie::all();
        return view('adminMovies', ['adminMovies' => $adminMovies]);
    }
}
