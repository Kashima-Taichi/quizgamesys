<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    // idはオートインクリメントなのでguarded設定
    protected $guarded = array('id');
    
    // クイズ登録時のバリデーション
    public static $rules = array (
        'question' => 'required',
        'option1' => 'required',
        'option2' => 'required',
        'option3' => 'required',
        'option4' => 'required',
        'correct' => 'required',
    );
}
