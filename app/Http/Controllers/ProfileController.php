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

        $portfolios = [
            [
                'name' => 'Invoice Management System',
                'stacks' => 'Laravel & Vue.js',
                'img' => asset('images/invoices.png'),
                'description' => nl2br("This application is for freelancers who want to manage invoices."),
                'url' => 'https://ims.jangwook.net/',
            ],
            [
                'name' => 'Svelte Weather',
                'stacks' => 'Svelte & Javascript',
                'img' => asset('images/weather.png'),
                'description' => nl2br("It's the application to retrieve weather which user input."),
                'url' => 'https://www.jangwook.net/svelte-weather/public/',
            ],
            [
                'name' => 'Let\'s Encrypt Domain Checker',
                'stacks' => 'HTML & Javascript',
                'img' => asset('images/domain.png'),
                'description' => nl2br("Let's Encrypt announced that there is bug in CAA code.\nSo they decided revoking certain certificates on March 4, 2020.\nI searched how to check my certification and decided to create application to check that certain domain is included in revoking target."),
                'url' => 'https://www.jangwook.net/letsencrypt-domain-checker/public/',
            ],
            [
                'name' => 'Music Salon - Front & Back',
                'stacks' => 'FuelPHP & Vue.js & JQuery',
                'img' => asset('images/music.jpg'),
                'description' => nl2br("My one client is managing music salon.\nThey wanted to managing people who wants to enroll client's experience lesson.\nThis system is for managing them."),
                'url' => '',
            ],
            [
                'name' => 'Blogs',
                'stacks' => 'English',
                'img' => asset('images/blog.png'),
                'description' => nl2br("I wrote some blogs to Medium."),
                'url' => 'https://kim-jangwook.medium.com/',
            ],
        ];

        $timing = 5;
        $count = count($portfolios);
        $carousel = [
            'timing' => $timing, // slide-change-timing
            'count' => $count, // carousel-items
            'duration' => ($timing * $count) . 's', // animation-timing
            'delayFraction' => $timing . 's', // animation-delay-fraction
            'stepFraction' => 100 / $count, // animation-steps-fraction
        ];

        return view('welcome', [
            'name' => $name,
            'portfolios' => $portfolios,
            'carousel' => $carousel,
        ]);
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
