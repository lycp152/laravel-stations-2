<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>movies</title>
</head>
<body>
    <ul>
    @foreach ($movies as $movies)
        <li>映画タイトル: {{ $movies->title }}</li>
        <img src="{{ $movies->image_url }}" alt="{{ $movies->title }}" />
    @endforeach
    </ul>
</body>
</html>
