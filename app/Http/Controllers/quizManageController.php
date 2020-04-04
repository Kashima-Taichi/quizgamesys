<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class quizManageController extends Controller
{
    // クイズの登録処理
    public function addQuiz (Request $request) {
        $this->validate($request, Question::$rules);
        $question = new Question;
        $formData = $request->all();
        unset($formData['_token']);
        // クイズの正解を設定するコード
        $formData['correct'] = $formData[$formData['correct']];
        $question->fill($formData)->save();
        return view('quizmanage/addquiz/addquiz');
    }
}
