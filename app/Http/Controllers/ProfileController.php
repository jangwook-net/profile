<?php

namespace App\Http\Controllers;

use App\Mail\ContactReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function welcome()
    {
        $name = 'Jangwook';
        return view('welcome', [ 'name' => $name ]);
    }

    public function contact()
    {
        // 送信されたデータをバリデーションする
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contents' => 'required',
        ]);

        // バリデーションされたデータをデータベースにINSERTする
        $contact = \App\Models\Contact::create($data);

        // Contactが届いたことを知らせるメール送信
        $mail = new \App\Mail\ContactReceived($contact);
        $mail->subject('Contact Received From My Profile Site.');
        \Illuminate\Support\Facades\Mail::to(env('MAIL_FROM_ADDRESS', 'kim.jangwook.1029@gmail.com'))
            ->send($mail);

        // 成功されたことを表すフラッシュを設定する
        Session::flash('contact_result', 'Thanks, I\'ll send you mail.');

        // 前のページに戻る
        return back();
    }
}
