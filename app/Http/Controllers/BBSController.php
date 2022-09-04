<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyPost;
use Log;
use App\Models\StudyPostReply;
use App\Models\Category;

class BBSController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
      }
    //
    public function index($categoryId) {
        // 掲示板の一覧を取得(確認)
        // 5件ずつ表示をする　(TODO 定数化)
        // $studyPostArray = StudyPost::where('category_id', '=', $categoryId)->simplePaginate(5);
        $studyPostArray = StudyPost::where('category_id', '=', $categoryId)->paginate(5);
        // カテゴリの一覧を取得
        $categoryArray = Category::all();
        foreach ($studyPostArray as $studyPost) {
        //確認
            $studyPostReplyArray = StudyPostReply::where('study_post_id' ,'=' , $studyPost->id)->get();
            // 子のデータがあれば紐づけをする
            if ($studyPostReplyArray) {
                $studyPost["studyPostReplyArray"] = $studyPostReplyArray;
            }
        }
        return view('bbs.bbs', compact('studyPostArray', 'categoryArray',
            'categoryId'));
    }





    public function index2($id) {
        // 確認
        $studyPostArray = StudyPostReply::where('study_post_id' ,'=' , $id)->get();
        return view('bbs.detail', compact('studyPostArray', 'id'));
    }



    public function registerReply(Request $request) {
        $name = $request->input('name');
        $email = $request->input('email');
        // 親のIDを取得
        $studyPostId = $request->input('studyPostId');
        // 内容を取得する
        $content = $request->input('content');
        // 入力された内容を登録する
        // study_postテーブルにinsert
        StudyPostReply::create([
            'study_post_id' => $studyPostId,
            'content' => $content,
            'name' => $name,
            'email' => $email,
            'user_id' =>1
        ]);
        // 掲示板のトップにリダイレクトする
        return redirect('bbs/detail/'.$studyPostId);
    }


    public function registerPost(Request $request) {
        $categoryId = $request->input('categoryId');
        $name = $request->input('name');
        $email = $request->input('email');
        // タイトルを取得する
        $title = $request->input('title');
        // 内容を取得する
        $content = $request->input('content');
        // 入力された内容を登録する
        // study_postテーブルにinsert
        $studyPost = StudyPost::create([
            'title' => $title,
            'content' => $content,
            'category_id' => $categoryId,
            'user_id' =>1
        ]);
        StudyPostReply::create([
            'study_post_id' => $studyPost->id,
            'content' => $content,
            'name' => $name,
            'email' => $email,
            'user_id' =>1
        ]);
        // 掲示板のトップにリダイレクトする
        return redirect('/bbs');
    }

    /**
     * スレ(親)の削除を実行
     * @param Request $request
     * @return 掲示板トップへリダイレクト
     */
    public function deletePost(Request $request) {
        $deletePostId= $request->input('deletePostId');
        // 紐づいた子のテーブルデータ削除
        StudyPostReply::where('study_post_id', $deletePostId)->delete();
        // 親のテーブルデータ削除
        StudyPost::where('id', $deletePostId)->delete();

        // 掲示板のトップにリダイレクトする
        return redirect('/bbs');
    }

    /**
     * レス(子)の削除を実行
     * @param Request $request
     * @return 掲示板トップへリダイレクト
     */
    public function deletePostReply(Request $request) {
        $deletePostReplyId= $request->input('deletePostReplyId');
        // テーブルデータ削除
        StudyPostReply::where('id', $deletePostReplyId)->delete();

        // 掲示板のトップにリダイレクトする
        return redirect('/bbs');
    }
}
