<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/styles/common.css') }}">
    <title>登録された個別のクイズを参照する</title>
</head>
<body>
    <div class="display-result">
        {{ $msg ?? '' }}
    </div>
    <h2>ID:{{ $individualQuiz->id }}のクイズ</h2>
    <table border="1" style="border-collapse: collapse">
    <tr>
    <th class="question">問題</th>
    <th class="option1">選択肢1</th>
    <th class="option2">選択肢2</th>
    <th class="option3">選択肢3</th>
    <th class="option4">選択肢4</th>
    <th class="correct">回答</th>
    </tr>
        <tr>
            <td>{{ $individualQuiz->question }}</td>
            <td>{{ $individualQuiz->option1 }}</td>
            <td>{{ $individualQuiz->option2 }}</td>
            <td>{{ $individualQuiz->option3 }}</td>
            <td>{{ $individualQuiz->option4 }}</td>
            <td>{{ $individualQuiz->correct }}</td>
        </tr>
    </table>
    <br>
    <div>
        <button><a href="{{ action('quizManageController@prepareEditQuiz', $individualQuiz->id) }}">このクイズを修正する</a></button>
        <button><a href="{{ action('quizManageController@deleteQuiz', $individualQuiz->id) }}">このクイズを削除する(※このボタンを押すと現在閲覧中のクイズは削除されます)</a></button>
    </div>
    <br>
    @include('components.linkToTop')
</body>
</html>
