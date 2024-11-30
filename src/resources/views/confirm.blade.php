@extends('layouts.app')

@section('content')

<div class="contact-form__content">
    <h2>確認画面</h2>

    <form action="/contacts" method="post">
        @csrf
        <table>
            <tr>
                <td>お名前</td>
                <td>{{ $contactData['last_name'] }} {{ $contactData['first_name'] }}</td>
            </tr>
            <tr>
                <td>性別</td>
                <td>{{ $contactData['gender'] == 1 ? '男性' : ($contactData['gender'] == 2 ? '女性' : 'その他') }}</td>
            </tr>
            <tr>
                <td>メールアドレス</td>
                <td>{{ $contactData['email'] }}</td>
            </tr>
            <tr>
                <td>お問い合わせ内容</td>
                <td>{{ $contactData['content'] }}</td>
            </tr>
        </table>

        <button type="submit">送信</button>
        <button type="button" onclick="history.back()">戻る</button>
    </form>
</div>
@endsection
