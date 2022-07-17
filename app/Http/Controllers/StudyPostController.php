<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyPost;
use Illuminate\Support\Facades\Log;
use App\Models\StudyPostReply;

class StudyPostController extends Controller
{
    /**
     *
     */
    public function index() {
        $studyPostArray = StudyPost::leftJoin('study_post_reply', 'study_post.id', '=', 'study_post_reply.study_post_id')
            ->select('study_post.id','study_post.title', 'study_post.content', 'study_post.created_at', 'study_post_reply.content as replyContent')
            ->orderBy('study_post.id', 'asc')->get();
        // studyPostArrayを画面に渡す( compact関数で配列に変換)
        $studyResponse = [];
        $studyResponseList = [];
        $prevId = 0;
        // foreach ($studyPostArray as $studyPost) {
        //     Log::info("初回");
        //     $prevId = $studyPost->id;
        //     $studyResponse["id"] = $studyPost->id;
        //     $studyResponse["title"] = $studyPost->title;
        //     $studyResponse["content"] = $studyPost->content;
        //     $studyResponse["createDate"] = $studyPost->created_at;
        //     if ($studyPost->replyContent) {
        //         $studyResponse["replyContent"][] = $studyPost->replyContent;
        //     }
        //     $studyResponseList[] = $studyResponse;
        // }
        $number = 1;
        foreach ($studyPostArray as $studyPost) {
            Log::info($number .'回目');
            Log::info($studyResponse);
            $number++;
            if (!$studyResponse) {
                Log::info("初回");
                $prevId = $studyPost->id;
                $studyResponse["id"] = $studyPost->id;
                $studyResponse["title"] = $studyPost->title;
                $studyResponse["content"] = $studyPost->content;
                $studyResponse["createDate"] = $studyPost->created_at;
                if ($studyPost->replyContent) {
                    $studyResponse["replyContent"][] = $studyPost->replyContent;
                }
            } else {
                if ($studyPost->id === $prevId) {
                    Log::info("IDが同じ");
                    if ($studyPost->replyContent) {
                        $studyResponse["replyContent"][] = $studyPost->replyContent;
                    }
                } else {
                    Log::info("IDが違う");
                    $studyResponseList[] = $studyResponse;
                    $studyResponse = [];
                    $studyResponse["id"] = $studyPost->id;
                    $studyResponse["title"] = $studyPost->title;
                    $studyResponse["content"] = $studyPost->content;
                    $studyResponse["createDate"] = $studyPost->created_at;
                    if ($studyPost->replyContent) {
                        $studyResponse["replyContent"][] = $studyPost->replyContent;
                    }
                    $prevId = $studyPost->id;
                }
            }
        }
        if ($studyResponse) {
            $studyResponseList[] = $studyResponse;
        }
        Log::info($studyResponseList);
        return view('studyPost.studyPost', compact('studyResponseList'));
    }

    public function registerPost(Request $request) {
        // タイトルを取得する
        $title = $request->input('title');
        // 内容を取得する
        $content = $request->input('content');
        // 入力された内容を登録する
        // study_postテーブルにinsert
        StudyPost::create([
            'title' => $title,
            'content' => $content,
            'user_id' =>1
        ]);
        // 掲示板のトップにリダイレクトする
        return redirect('/keijiban');
    }

    public function registerReply(Request $request) {
        // タイトルを取得する
        $studyPostId = $request->input('studyPostId');
        // 内容を取得する
        $content = $request->input('content');
        // 入力された内容を登録する
        // study_postテーブルにinsert
        StudyPostReply::create([
            'study_post_id' => $studyPostId,
            'content' => $content,
            'user_id' =>1
        ]);
        // 掲示板のトップにリダイレクトする
        return redirect('/keijiban');
    }
}
