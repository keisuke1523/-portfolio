<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Illuminate\Support\Facades\Mail;

class contactController extends Controller
{
    public function index() {

        return view('contact.contact');
    }

    public function sendMail(Request $request) {
        // リクエストの値
        $name = $request->input('name');
        $nameKana = $request->input('nameKana');
        $fromMail = $request->input('email');
        $title = $request->input('title');
        $content = $request->input('content');
        // リクエストの値をメール用に設定
        $data = [
            'name' => $name,
            'nameKana' => $nameKana,
            'fromMail' => $fromMail,
            'title' => $title,
            'content' => $content
        ];
        // メールの送信を実行する
        Mail::send('emails.contactMail', $data, function($message){
            // メールアドレス、件名を設定
             $message->to('u8764c28e772tz@gmail.com')->subject('問い合わせ内容');
    	});
        return view('contact.contact');
    }
}
