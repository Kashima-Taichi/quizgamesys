<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>QuizGame App</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('/styles/top.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    QuizGame App
                </div>

                <div class="links">
                    <a href="<?php echo route('quizManage'); ?>">クイズの管理</a>
                    <a href="<?php echo route('playquiz'); ?>">クイズをplayする</a>
                </div>
            </div>
        </div>
    </body>
</html>
