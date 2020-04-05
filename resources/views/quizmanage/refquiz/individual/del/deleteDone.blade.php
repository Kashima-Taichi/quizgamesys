<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/styles/common.css') }}">
    <title>参照中のクイズはDBから削除されました！</title>
</head>
<body>
    <h2>ID:{{ $toBeDeletedQuiz->id }}のクイズを削除しました</h2>
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
            <td>{{ $toBeDeletedQuiz->question }}</td>
            <td>{{ $toBeDeletedQuiz->option1 }}</td>
            <td>{{ $toBeDeletedQuiz->option2 }}</td>
            <td>{{ $toBeDeletedQuiz->option3 }}</td>
            <td>{{ $toBeDeletedQuiz->option4 }}</td>
            <td>{{ $toBeDeletedQuiz->correct }}</td>
        </tr>
    </table>
    <br>
    @include('components.linkToTop')
</body>
</html>
