<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/styles/common.css') }}">
    <link rel="stylesheet" href="{{ asset('/styles/addquiz.css') }}">
    <title>クイズを修正する</title>
</head>
<body>
    <div class="recform">
    @if (count($errors) > 0)
        <h3>入力内容に問題があります</h3>
    @endif
    <h2>ID:{{ $toBeEditedQuiz->id }}のクイズの修正を行なう</h2>
    <form action="/quizmanage/refquiz/individual/edit/editQuiz/editDoneQuiz" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $toBeEditedQuiz->id }}">
        <h4>クイズの問題を入力してください</h4>
        <textarea type="text" id="question" name="question" class="question">{{ $toBeEditedQuiz->question }}</textarea>
        <br>
        <p>選択肢1を入力して下さい</p>
        <input type="text" id="option1" name="option1" class="option1" value="{{ $toBeEditedQuiz->option1 }}">
        <br>
        <p>選択肢2を入力して下さい</p>
        <input type="text" id="option2" name="option2" class="option2" value="{{ $toBeEditedQuiz->option2 }}">
        <br>
        <p>選択肢3を入力して下さい</p>
        <input type="text" id="option3" name="option3" class="option3" value="{{ $toBeEditedQuiz->option3 }}">
        <br>
        <p>選択肢4を入力して下さい</p>
        <input type="text" id="option4" name="option4" class="option4" value="{{ $toBeEditedQuiz->option4 }}">
        <br>
        <p>答えを選択して下さい</p>
        <select class="correct" name="correct" id="correct">
            <option value="select">選択してください</option>
            <option value="option1">選択肢1</option>
            <option value="option2">選択肢2</option>
            <option value="option3">選択肢3</option>
            <option value="option4">選択肢4</option>
        </select>
        <br>
        <br>
        <input class="submit" id="submit" type="submit" value="クイズを修正する">
        <br>
        <div class="display-result">
            {{ $msg ?? '' }}
        </div>
    </form>
        <br>
        @include('components.linkToTop')
    </div>
</body>
</html>