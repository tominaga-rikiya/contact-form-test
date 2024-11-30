@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('contacts.search') }}" method="GET">
        @csrf
        <div>
    <input type="text" name="name" placeholder="名前" value="{{ request('name') }}">
  </div>
  <div>
    <input type="text" name="email" placeholder="メールアドレス" value="{{ request('email') }}">
  </div>
  <div>
    <select name="gender">
      <option value="">性別</option>
      <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
      <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
      <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
    </select>
  </div>
  <div>
    <select name="category_id">
      <option value="">お問い合わせ種類</option>
      @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
          {{ $category->content }}
        </option>
      @endforeach
    </select>
  </div>
  <div>
    <input type="date" name="date" value="{{ request('date') }}">
  </div>
  <button type="submit">検索</button>
  <button type="reset" onclick="location.href='{{ route('contacts.index') }}'">リセット</button>
</form>