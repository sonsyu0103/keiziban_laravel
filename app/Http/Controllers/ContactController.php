<?php

namespace App\Http\Controllers;

use App\User;
use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function indexContact(Request $request)
    {
        $this->validate($request,[
            'message'=>'required|max:1000',
        ]);

        $email=\Auth::user()->email;
        $message=$request->message;

        //二重送信防止のトークン作成
        $request->session()->regenerateToken();

        return view('indexContact',[
            'email'=>$email,
            'message'=>$message,
        ]);
    }

    public function storeContact(Request $request)
    {
        $mail=$request->all();

        if($request->action==="戻る")
        {
            return redirect()->route('contact')->withInput($mail);
        }

        $request->session()->regenerateToken();

        $contact=new Contact;
        $contact->message=$request->message;
        $contact->user_id=\Auth::user()->id;
        $contact->save();

        //送信メール
        \Mail::send(new \App\Mail\Contact([
            'to'=>$request->email,
            'to_name'=>\Auth::user()->name,
            'from'=>'sonsyu0103@yahoo.co.jp',
            'from_name'=>'管理人',
            'subject'=>'お問い合わせありがとうございました。',
            'message'=>$request->message,
        ]));

        //受信メール
        \Mail::send(new \App\Mail\Contact([
            'to'=>'sonsyu0103@yahoo.co.jp',
            'to_name'=>'管理人',
            'from'=>$request->email,
            'from_name'=>\Auth::user()->name,
            'subject'=>'サイトからのお問い合わせ',
            'message'=>$request->message,
        ],'from'));

        return view('storeContact');
    }
}
