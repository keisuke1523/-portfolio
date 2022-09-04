<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\diarypost;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
class diaryController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }

   /**
     * 一覧画面表示処理
     * @return 一覧画面
     */
    public function index() {
      // daiary_postテーブルからデータを全て取得
      // (select * from diary_post order by updated_at DESC)
      $diarypostArray = diarypost::where('user_id', '=', Auth::id())->orderBy('updated_at' ,'desc')->Paginate(5);
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
    // 現在認証されているユーザーのID取得
    $id = Auth::id();
    // 入力された内容を登録する
    // study_postテーブルにinsert
    diarypost::create([
        'title' => $title,
        'content' => $content,
        'user_id' => $id,
        'image' => $image
    ]);
    // 掲示板のトップにリダイレクトする
    return redirect('/diary');
}
}

