<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\diarypost;
use Illuminate\Support\Facades\Log;
class diaryController extends Controller
{


   /**
     * 一覧画面表示処理
     * @return 一覧画面
     */
    public function index() {
      // daiary_postテーブルからデータを全て取得
      // (select * from study_post)
      $diarypostArray = diarypost::simplePaginate(5);
      // studyPostArrayを画面に渡す( compact関数で配列に変換)
      return view('diary.diary', compact('diarypostArray'));
  }







  public function registerPost(Request $request) {
    // タイトルを取得する
    log::info("投稿内容=", $request->input());
    $title = $request->input('title');
    // 内容を取得する
    $content = $request->input('content');

    // 画像を取得
    $image = "";
    if ($request->imageFile) {
    $image = base64_encode(file_get_contents($request->imageFile->getRealPath()));
     }
    // 入力された内容を登録する
    // study_postテーブルにinsert
    diarypost::create([
        'title' => $title,
        'content' => $content,
        'user_id' =>1,
        'image' => $image
    ]);
    // 掲示板のトップにリダイレクトする
    return redirect('/diary');
}
}

