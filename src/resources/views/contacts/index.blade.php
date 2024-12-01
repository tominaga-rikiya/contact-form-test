@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
  <div class="contact-form__heading">
    <h2>Contact</h2>
  </div>
  <form class="form" action="{{ route('contacts.confirm') }}" method="post">

    @csrf

    <table class="form-table">

      <tr>
        <td class="form__label">
          <span class="form__label--item">お名前※</span>
        </td>
        <td class="form__input--name">
          <div class="your-name">
            <input type="text" name="first_name" id="first_name" value="{{ old('first_name', session('form_data.first_name')) }}"  placeholder="例:山田">
            <input type="text" name="last_name" id="last_name" value="{{ old('last_name', session('form_data.last_name')) }}"  placeholder="例:太郎">
            <div class="form__error">
              @error('first_name')
                {{ $message }}
              @enderror
            </div>
            <div class="form__error">
              @error('last_name')
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
          <input type="radio" name="gender" id="male" value="1" {{ old('gender', session('form_data.gender',1)) == '1' ? 'checked' : '' }} >
          <label for="male">男性</label>
          <input type="radio" name="gender" id="female" value="2" {{ old('gender', session('form_data.gender')) == '2' ? 'checked' : '' }}>
          <label for="female">女性</label>
          <input type="radio" name="gender" id="other" value="3" {{ old('gender', session('form_data.gender')) == '3' ? 'checked' : '' }}>
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
          <input type="email" name="email" id="email" value="{{ old('email', session('form_data.email')) }}"  placeholder="例:test@example.com">
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
            <input type="text" name="tel1" id="tel1" value="{{ old('tel1', session('form_data.tel1')) }}" class="form__input--phone" maxlength="4" placeholder="080">
            <span class="separator">-</span>
            <input type="text" name="tel2" id="tel2" value="{{ old('tel2', session('form_data.tel2')) }}" class="form__input--phone" maxlength="4" placeholder="1234">
            <span class="separator">-</span>
            <input type="text" name="tel3" id="tel3" value="{{ old('tel3', session('form_data.tel3')) }}" class="form__input--phone" maxlength="4" placeholder="5678">
          </div>
          <div class="form__error">
            @error('tel1')
              {{ $message }}
            @enderror
            @error('tel2')
              {{ $message }}
            @enderror
            @error('tel3')
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
          <input type="text" name="address" id="address" value="{{ old('address', session('form_data.address')) }}"  placeholder="例:東京都渋谷区千駄ヶ谷1-2-3">
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
          <input type="text" name="building" id="building" value="{{ old('building', session('form_data.building')) }}"  placeholder="例:千駄ヶ谷マンション101">
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
          <select name="inquiry_type" id="inquiry_type" class="form__input--dropdown">
            <option value="" selected>選択してください</option>
            <option value="1" {{ old('inquiry_type', session('form_data.inquiry_type')) == '1' ? 'selected' : '' }}>商品のお届けについて</option>
            <option value="2" {{ old('inquiry_type', session('form_data.inquiry_type')) == '2' ? 'selected' : '' }}>商品の交換について</option>
            <option value="3" {{ old('inquiry_type', session('form_data.inquiry_type')) == '3' ? 'selected' : '' }}>商品トラブル</option>
            <option value="4" {{ old('inquiry_type', session('form_data.inquiry_type')) == '4' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
            <option value="5" {{ old('inquiry_type', session('form_data.inquiry_type')) == '5' ? 'selected' : '' }}>その他</option>
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
          <textarea name="content" placeholder="お問い合わせ内容をご記載ください">{{ old('content', session('form_data.content')) }}</textarea>
          <div class="form__error">
            @error('content')
              {{ $message }}
            @enderror
          </div>
        </td>
      </tr>
    </table>

    <div class="form__button">
      <button class="form__button-submit" type="submit">確認画面</button>
    </div>

  </form>
</div>
@endsection
