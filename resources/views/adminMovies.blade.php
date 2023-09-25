<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>movies</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>映画タイトル</th>
            <th>画像</th>
            <th>公開年</th>
            <th>上映中かどうか</th>
            <th>概要</th>
            <th>登録日時</th>
            <th>更新日時</th>
            <th>操作</th>
        </tr>
        @foreach ($adminMovies as $adminMovie)
        <tr>
            <td>{{ $adminMovie->id }}</td>
            <td>{{ $adminMovie->title }}</td>
            <td><img src="{{ $adminMovie->image_url }}" alt="{{ $adminMovie->title }}" /></td>
            <td>{{ $adminMovie->published_year }}</td>
            <td>{{ $adminMovie->is_showing ? '上映中' : '上映予定' }}</td>
            <td>{{ $adminMovie->description }}</td>
            <td>{{ $adminMovie->created_at }}</td>
            <td>{{ $adminMovie->updated_at }}</td>
            <td>
                <button onclick="window.location.href='{{ route('admin.movies.edit', ['id' => $adminMovie->id]) }}'">編集</button>
            </td>

        </tr>
        @endforeach
    </table>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editLinks = document.querySelectorAll('.edit-link');

            editLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    window.location.href = link.getAttribute('href');
                });
            });
        });
    </script>
</body>
</html>
