<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/styles/common.css') }}">
    <link rel="stylesheet" href="{{ asset('/styles/addquiz.css') }}">
    <title>クイズゲームをする</title>
</head>
<body>
    <div class="points">
        {{ $correctPoints }}
    </div>
    <div class="points">
        {{ $inCorrectPoints }}
    </div>
    <div class="question">
        <p>{{ $randomQuiz->question }}</p>
    </div>
    <div class="options">
        <form action="/playquiz" method="post">
        @csrf
        <div>
            <input type="radio" name="answer" id="" value="{{ $randomQuiz->option1 }}"><label for="">{{ $randomQuiz->option1 }}</label>
        </div>
        <div>
            <input type="radio" name="answer" id="" value="{{ $randomQuiz->option2 }}"><label for="">{{ $randomQuiz->option2 }}</label>
        </div>
        <div>
            <input type="radio" name="answer" id="" value="{{ $randomQuiz->option3 }}"><label for="">{{ $randomQuiz->option3 }}</label>
        </div>
        <div>
            <input type="radio" name="answer" id="" value="{{ $randomQuiz->option4 }}"><label for="">{{ $randomQuiz->option4 }}</label>
        </div>
            <input type="submit" value="回答を送信する！">
            <input type="hidden" name="id" value="{{ $randomQuiz->id }}">
            <input type="hidden" name="correctPoints" value="{{ $correctPoints }}">
            <input type="hidden" name="inCorrectPoints" value="{{ $inCorrectPoints }}">
            <input type="hidden" name="questionedIds" value="{{ $questionedIds }}">
        </form>
    </div>
</body>
</html>