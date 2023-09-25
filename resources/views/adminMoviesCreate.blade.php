<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>映画作品登録</title>
</head>
<body>
    <h1>映画作品登録</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/admin/movies/store" method="POST">
        @csrf <!-- LaravelのCSRFトークンを追加 -->

        <!-- 映画タイトル -->
        <label for="title">映画タイトル：</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" required><br>

        <!-- 画像URL -->
        <label for="image_url">画像URL：</label>
        <input type="text" id="image_url" name="image_url" value="{{ old('image_url') }}" required><br>

        <!-- 公開年 -->
        <label for="published_year">公開年：</label>
        <input type="number" id="published_year" name="published_year" value="{{ old('published_year') }}" required><br>

        <!-- 上映中かどうか -->
        <label for="is_showing">上映中かどうか：</label>
        <input type="checkbox" id="is_showing" name="is_showing" value="1" {{ old('is_showing') ? 'checked' : '' }}><br>

        <!-- 概要 -->
        <label for="description">概要：</label><br>
        <textarea id="description" name="description" rows="4" cols="50">{{ old('description') }}</textarea><br>

        <!-- 送信ボタン -->
        <input type="submit" value="登録">
    </form>
</body>
</html>
