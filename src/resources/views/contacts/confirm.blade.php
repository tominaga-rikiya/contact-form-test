@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
  <div class="contact-form__heading">
    <h2>confirm</h2>
  </div>

  <form action="{{ route('contacts.thanks') }}" method="POST">
    @csrf

    <table class="form-table" border="1">
      <tr>
        <td class="form__label">お名前</td>
        <td class="form__input">
          {{ $validated['first_name'] }} {{ $validated['last_name'] }}
        </td>
      </tr>

      <tr>
        <td class="form__label">性別</td>
        <td class="form__input">
          {{ $validated['gender'] == '1' ? '男性' : ($validated['gender'] == '2' ? '女性' : 'その他') }}
        </td>
      </tr>

      <tr>
        <td class="form__label">メールアドレス</td>
        <td class="form__input">
          {{ $validated['email'] }}
        </td>
      </tr>

      <tr>
        <td class="form__label">電話番号</td>
        <td class="form__input">
          {{ $validated['tel1'] }}-{{ $validated['tel2'] }}-{{ $validated['tel3'] }}
        </td>
      </tr>

      <tr>
        <td class="form__label">住所</td>
        <td class="form__input">
          {{ $validated['address'] }} {{ $validated['building'] }}
        </td>
      </tr>

      <tr>
        <td class="form__label">お問い合わせの種類</td>
        <td class="form__input">
          @switch($validated['inquiry_type'])
            @case(1)
              商品のお届けについて
              @break
            @case(2)
              商品の交換について
              @break
            @case(3)
              商品トラブル
              @break
            @case(4)
              ショップへのお問い合わせ
              @break
            @case(5)
              その他
              @break
          @endswitch
        </td>
      </tr>

      <tr>
        <td class="form__label">お問い合わせ内容</td>
        <td class="form__input">
          {{ $validated['content'] }}
        </td>
      </tr>
    </table>

    <div class="form__button">
      <button type="submit" class="form__button-submit">送信</button>
    </div>
  </form>

  <form action="{{ route('contacts.index') }}" method="GET">
    <div class="form__button">
      <button type="submit" class="form__button-submit">修正</button>
    </div>
  </form>
</div>
@endsection
