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
    <!-- フラッシュメッセージを表示 -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- 画面内のテーブルとボタンを表示 -->
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
                <button onclick="confirmAndDelete({{ $adminMovie->id }})">削除</button>
            </td>
        </tr>
        @endforeach
    </table>

    <!-- JavaScriptのコード -->
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

        function confirmAndDelete(movieId) {
            if (confirm('本当に削除しますか？')) {
                fetch(`/admin/movies/${movieId}/destroy`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error('削除に失敗しました');
                    }
                })
                .then(data => {
                    if (data.success) {
                        // メッセージを表示
                        const messageDiv = document.createElement('div');
                        messageDiv.innerText = data.success;
                        messageDiv.classList.add('alert', 'alert-success');
                        document.body.appendChild(messageDiv);

                        // メッセージを非表示にするために一定時間後に削除
                        setTimeout(function() {
                            messageDiv.remove();
                        }, 3000);

                        // ページをリロードせずに成功メッセージを表示
                        window.location.reload();
                    } else {
                        alert(data.error);
                    }
                })
                .catch(error => {
                    console.error('削除エラー:', error);
                });
            }
        }
    </script>
</body>
</html>
