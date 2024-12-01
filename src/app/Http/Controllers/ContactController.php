<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // フォームページ
    public function index()
    {
        return view('contacts.index');
    }

    // 確認画面
    public function confirm(Request $request)
    {
        // バリデーションをここで行う場合
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required',
            'email' => 'required|email',
            'tel1' => 'required|numeric',
            'tel2' => 'required|numeric',
            'tel3' => 'required|numeric',
            'address' => 'required|string',
            'building' => 'required|string',
            'inquiry_type' => 'required',
            'content' => 'required|string|max:120',
        ]);

        // セッションに入力データを保存
        $request->session()->flash('form_data', $validated);

        // 入力データを確認画面に渡す
        return view('contacts.confirm', compact('validated'));
        return back()->withErrors($validator)->withInput();

    }

    // 送信処理
    public function store(ContactRequest $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required',
            'email' => 'required|email',
            'tel1' => 'required|numeric|digits:4',
            'tel2' => 'required|numeric|digits:4',
            'tel3' => 'required|numeric|digits:4',
            'address' => 'required|string',
            'building' => 'required|string',
            'inquiry_type' => 'required',
            'content' => 'required|string|max:120',
        ]);

        Contact::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'gender' => $validated['gender'],
            'email' => $validated['email'],
            'tel' => $validated['tel1'] . '-' . $validated['tel2'] . '-' . $validated['tel3'],  
            'address' => $validated['address'],
            'building' => $validated['building'],
            'inquiry_type' => $validated['inquiry_type'],
            'content' => $validated['content'],
        ]);
        
        $request->session()->forget('form_data');

        SendEmailJob::dispatchSync($emailData); 
        return redirect()->route('thanks');
    }
    public function thanks()
    {
        return view('contacts.thanks');  
    }
}

