<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/styles/common.css') }}">
    <link rel="stylesheet" href="{{ asset('/styles/paginate.css') }}">
    <title>登録されたクイズを参照する</title>
</head>
<body>
    <h2>登録されたクイズ一覧</h2>
    <table border="1" style="border-collapse: collapse">
    <tr>
    <th class="id">id</th>
    <th class="question">問題</th>
    <th class="option1">選択肢1</th>
    <th class="option2">選択肢2</th>
    <th class="option3">選択肢3</th>
    <th class="option4">選択肢4</th>
    <th class="correct">回答</th>
    </tr>
        @foreach ($questions as $question)
            <tr>
                <td><a id="link" href="{{ action('quizManageController@refIndividualQuiz', $question->id) }}"> {{ $question->id }}</a></td>
                <td>{{ $question->question }}</td>
                <td>{{ $question->option1 }}</td>
                <td>{{ $question->option2 }}</td>
                <td>{{ $question->option3 }}</td>
                <td>{{ $question->option4 }}</td>
                <td>{{ $question->correct }}</td>
            </tr>
        @endforeach
    </table>
        {{ $questions->links() }}
    <br>
    @include('components.linkToTop')
</body>
</html>
