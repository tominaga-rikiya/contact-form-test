@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection


@section('content')
<div class="contact-form__content">
  <div class="contact-form__heading">
    <h2>Contact</h2>
  </div>

  <form class="form" action="contacts/confirm" method="post">
    @csrf
    <table class="form-table">
      <tr>
        <td class="form__label">
          <span class="form__label--item">お名前※</span>
        </td>
        <td class="form__input--name">
        <div class="your-name">
            <input type="text" name="last_name" value="{{ old('last_name', $contacts->first()->last_name ?? '') }}"  required placeholder="例:山田"> 
            <input type="text" name="first_name" value="{{ old('first_name', $contacts->first()->first_name ?? '') }}"  required placeholder="例:太郎">
            <div class="form__error">
              @error('last_name')
                {{ $message }}
              @enderror
            </div>
            <div class="form__error">
              @error('first_name')
                {{ $message }}
              @enderror
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td class="form__label">
          <span class="form__label--item">性別※</span>
        </td>
        <td class="form__input--gender">
          <input type="radio" id="male" name="gender" value="1" {{ $contacts->first()->gender == 1 ? 'checked' : '' }} >
          <label for="male">男性</label>
          <input type="radio" id="female" name="gender" value="2" {{ $contacts->first()->gender == 2 ? 'checked' : '' }} >
          <label for="female">女性</label>
          <input type="radio" id="other" name="gender" value="3" {{ $contacts->first()->gender == 3 ? 'checked' : '' }} >
          <label for="other">その他</label>
          <div class="form__error">
            @error('gender')
              {{ $message }}
            @enderror
          </div>
        </td>
      </tr>
      <tr>
        <td class="form__label">
          <span class="form__label--item">メールアドレス※</span>
        </td>
        <td class="form__input">
          <input type="email" name="email" value="{{ old('email', $contacts->first()->email ?? '') }}"  placeholder=" 例:test@example.com">
          <div class="form__error">
            @error('email')
              {{ $message }}
            @enderror
          </div>
        </td>
      </tr>
      <tr>
        <td class="form__label">
          <span class="form__label--item">電話番号※</span>
        </td>
        <td class="form__input">
          <div class="your-phone">
            <input type="text" name="tel" value="{{ old('tel', $contacts->first()->tel ?? '') }}" class="form__input--phone" maxlength="4" placeholder="080">
            <span class="separator">-</span>
            <input type="text" name="tel" value="{{ old('tel', substr($contacts->first()->tel, 4, 4)) }}" yclass="form__input--phone" maxlength="4" placeholder="1234">
            <span class="separator">-</span>
            <input type="text" name="tel" value="{{ old('tel', substr($contacts->first()->tel, 8, 4)) }}" class="form__input--phone" maxlength="4" placeholder="5678">
          </div>
          <div class="form__error">
            @error('tel')
              {{ $message }}
            @enderror
          </div>
        </td>
      </tr>
      <tr>
        <td class="form__label">
          <span class="form__label--item">住所※</span>
        </td>
        <td class="form__input">
          <input type="text" name="address" value="{{ old('address', $contacts->first()->address ?? '') }}"  placeholder=" 例:東京都渋谷区千駄ヶ谷1-2-3">
          <div class="form__error">
            @error('address')
              {{ $message }}
            @enderror
          </div>
        </td>
      </tr>
      <tr>
        <td class="form__label">
          <span class="form__label--item">建物名※</span>
        </td>
        <td class="form__input">
          <input type="text" name="building" value="{{ old('building', $contacts->first()->building ?? '') }}"  placeholder=" 例:千駄ヶ谷マンション101">
          <div class="form__error">
            @error('building')
              {{ $message }}
            @enderror
          </div>
        </td>
      </tr>
      <tr>
        <td class="form__label">
          <span class="form__label--item">お問い合わせの種類※</span>
        </td>
        <td class="form__input">
          <select name="inquiry_type" class="form__input--dropdown">
            <option value=""  selected>選択してください</option>
            <option value="1" {{ $contacts->first()->inquiry_type == 1 ? 'selected' : '' }}>商品のお届けについて</option>
            <option value="2" {{ $contacts->first()->inquiry_type == 2 ? 'selected' : '' }}>商品の交換について</option>
            <option value="3" {{ $contacts->first()->inquiry_type == 3 ? 'selected' : '' }}>商品トラブル</option>
            <option value="4" {{ $contacts->first()->inquiry_type == 4 ? 'selected' : '' }}>ショップへのお問い合わせ</option>
            <option value="5" {{ $contacts->first()->inquiry_type == 5 ? 'selected' : '' }}>その他</option>
          </select>
          <div class="form__error">
            @error('inquiry_type')
              {{ $message }}
            @enderror
          </div>
        </td>
      </tr>
      <tr>
        <td class="form__label">
          <span class="form__label--item">お問い合わせ内容※</span>
        </td>
        <td class="form__input">
          <textarea name="content"  placeholder="お問い合わせ内容をご記載ください">{{ old('content', $contacts->first()->content ?? '') }}</textarea>
          <div class="form__error">
            @error('content')
              {{ $message }}
            @enderror
 </div>
      </div>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">送信</button>
    </div>
  </form>
</div>
@endsection