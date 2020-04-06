<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Log;

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

    // 登録したクイズの参照処理
    public function referenceQuiz() {
        $questions = Question::paginate(6);
        return view('quizmanage/refquiz/referenceQuiz', ['questions' => $questions]);
    }

    // 個別のクイズを参照しにいく
    public function refIndividualQuiz($id) {
        $individualQuiz = Question::find($id);
        return view('quizmanage/refquiz/individual/refIndividualQuiz', ['individualQuiz' => $individualQuiz]);
    }

    // 個別のクイズ内容を修正する
    public function prepareEditQuiz($id) {
        $toBeEditedQuiz = Question::find($id);
        return view('quizmanage/refquiz/individual/edit/editQuiz', ['toBeEditedQuiz' => $toBeEditedQuiz]);
    }

    // クイズの内容を修正する処理
    public function editQuizDone(Request $request) {
        $this->validate($request, Question::$rules);
        // 個別のクイズ内容修正の時と同じ変数にすることで、修正後に個別のクイズページへ遷移させることが出来る
        $individualQuiz = Question::find($request->id);
        $editContents = $request->all();
        unset($editContents['_token']);
        // クイズの正解の再設定処理
        $editContents['correct'] = $editContents[$editContents['correct']];
        $individualQuiz->fill($editContents)->save();
        return view('quizmanage/refquiz/individual/refIndividualQuiz', ['individualQuiz' => $individualQuiz, 'msg' => 'クイズの修正が完了しました']);
    }

    // 個別のクイズ項目を削除する
    public function deleteQuiz($id) {
        $toBeDeletedQuiz = Question::find($id);
        Question::destroy($id);
        return view('quizmanage/refquiz/individual/del/deleteDone', ['toBeDeletedQuiz' => $toBeDeletedQuiz]);
    }

    // 初回のクイズを出題
    public function outPutQuiz() {
        $randomQuiz = Question::inRandomOrder()->limit(1)->first();
        $correctPoints = 0;
        $inCorrectPoints = 0;
        $questionedIds = $randomQuiz->id;
        return view('game/game', ['randomQuiz' => $randomQuiz, 
        'correctPoints' => $correctPoints, 
        'inCorrectPoints' => $inCorrectPoints, 
        'questionedIds' => $questionedIds]);
    }

    //クイズの答え合わせと2回目以降の出題
    public function outPutQuizAfter(Request $request) {
        // 答え合わせ(チェックボックスを使うと、hidden属性はチェックボックスの属性値と異なるものを使用しないといけない)
        $quizQuestioned = Question::where('id', $request->id)->first();
        $quizQuestioned->correct === $request->answer ? $request->correctPoints++ : $request->inCorrectPoints++;
        $pastQuestionedIds[] = $request->questionedIds; 
        Log::debug($pastQuestionedIds);
        if (count($pastQuestionedIds) > 7) { array_splice($pastQuestionedIds[], 0, 1); }
        do { $randomQuiz = Question::inRandomOrder()->limit(1)->first(); } while (in_array($randomQuiz->id, $pastQuestionedIds) === true);
        // pastQuestionedIdsをカンマ区切りで配列にする　関数内でずっとカンマ区切りの変数になっている
        $pastQuestionedIds[] = $randomQuiz->id;
        Log::debug($pastQuestionedIds);
        // こいつを配列化して
        $idsForView = implode(',', $pastQuestionedIds);
        return view('game/game', ['randomQuiz' => $randomQuiz,
        'correctPoints' => $request->correctPoints, 
        'inCorrectPoints' => $request->inCorrectPoints, 
        'questionedIds' => $idsForView
        ]);

    }
}