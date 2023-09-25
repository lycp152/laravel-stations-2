<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>映画を編集</title>
</head>
<body>
    <h1>映画を編集</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="/admin/movies/{{ $movie->id }}/update">
        @csrf
        @method('PATCH')

        <div>
            <label for="title">タイトル：</label>
            <input type="text" name="title" value="{{ old('title', $movie->title) }}" required>
        </div>

        <div>
            <label for="image_url">画像のURL：</label>
            <input type="url" name="image_url" value="{{ old('image_url', $movie->image_url) }}" required>
        </div>

        <div>
            <label for="published_year">公開年：</label>
            <input type="number" name="published_year" value="{{ old('published_year', $movie->published_year) }}" required>
        </div>

        <div>
            <label for="description">概要：</label>
            <textarea name="description" required>{{ old('description', $movie->description) }}</textarea>
        </div>

        <div>
            <label>上映中かどうか：</label>
            <input type="checkbox" name="is_showing" value="1" {{ old('is_showing', $movie->is_showing) ? 'checked' : '' }}>
        </div>


        <div>
            <button type="submit">映画を更新</button>
        </div>
    </form>
</body>
</html>
