<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\StudyPost2;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{

    /**
     * ログイン画面表示
     * @return ログイン画面
     */



    public function index()
    {
        return view('login');
    }

    /**
     * ログイン処理
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {

        Log::info("リクエストパラメータ", $request->input());
        if ($this->validateLogin($request)) {
            Log::error("入力チェック失敗");
            return redirect('/login');
        }
        if ($this->checkLoginUser($request)) {
            return redirect('/login');
        } else {
            Log::info("ログイン成功");
            return redirect('/toppage');
        }
    }
    
    


    /**
     * 入力チェック
     * @param Request $request
     * @return bool
     */
    private function validateLogin(Request $request) {
        $isValidate = false;
        $errorMessage = [];
        // 入力したメールアドレスを取得
        $email = $request->input('email');
        // 入力したパスワードを取得
        $password = $request->input('password');
        // メールアドレスチェック
        if (empty($email)) {
            $errorMessage["email"] = "メールアドレスが未入力です";
        }
        // パスワードチェック
        if (empty($password)) {
            $errorMessage["password"] = "パスワードが未入力です";
        }
        // エラーがある場合はセッションにメッセージを設定する
        if (0 < count($errorMessage)) {
            $request->session()->flash('errorMessage', $errorMessage);
            $isValidate = true;
        }
        return $isValidate;
    }

    
     
    

    /**
     * メールアドレス、パスワードが正しいかチェック
     * @param Request $request
     * @return bool
     */
    private function checkLoginUser(Request $request) {
        $isValidate = false;
        $errorMessage = [];
        $user = StudyPost2::where([['email','=', $request->input('email')]])->first();
        Log::info($user);
        if ($user) {
            if (!Hash::check($request->input('password'), $user->password)) {
                // パスワードが間違っている場合
                $errorMessage["error"] = "ユーザIDまたはパスワードが間違っています";
            }
        } else {
            // ユーザ情報が取得できない場合
            $errorMessage["error"] = "ユーザIDまたはパスワードが間違っています";
        }
        // エラーがある場合はセッションにメッセージを設定する
        if (0 < count($errorMessage)) {
            $request->session()->flash('errorMessage', $errorMessage);
            $isValidate = true;
        }
        return $isValidate;
    }

     // ログアウト処理
     public function logout(Request $request)
     {
         Auth::logout();
 
         $request->session()->invalidate();
 
         $request->session()->regenerate();
 
         return redirect('/login');
     }
 
}












