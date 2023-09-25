<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Movie;
use Illuminate\Http\Request;

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

    public function adminMoviesCreate()
    {
        $adminMoviesCreate = Movie::all();
        return view('adminMoviesCreate', ['adminMoviesCreate' => $adminMoviesCreate]);
    }

    public function adminMoviesStore(Request $request)
{
    // バリデーションルールの定義
$rules = [
    'title' => 'required|unique:movies|max:255',
    'image_url' => 'required|url',
    'published_year' => 'required|integer',
    'description' => 'required|string',
    'is_showing' => 'required|boolean',
];

    // バリデーションの実行
    $validatedData = $request->validate($rules);

    // 映画情報をデータベースに保存
    $movie = new Movie();
    $movie->title = $validatedData['title'];
    $movie->image_url = $validatedData['image_url'];
    $movie->published_year = $validatedData['published_year'];
    $movie->description = $validatedData['description'];
    $movie->is_showing = $validatedData['is_showing'];
    $movie->save();

    // 成功時のリダイレクトやメッセージ
    return redirect('/admin/movies/create')->with('success', '映画が正常に登録されました。');
}

}
