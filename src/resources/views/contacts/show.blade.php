@extends('layouts.app')

@section('content')

<table>
  <thead>
    <tr>
      <th>名前</th>
      <th>メールアドレス</th>
      <th>性別</th>
      <th>お問い合わせ種類</th>
      <th>日付</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    @foreach($contacts as $contact)
    <tr>
      <td>{{ $contact->name }}</td>
      <td>{{ $contact->email }}</td>
      <td>{{ $contact->gender }}</td>
      <td>{{ $contact->category->content }}</td>
      <td>{{ $contact->created_at->format('Y-m-d') }}</td>
      <td>
        <button onclick="showDetail({{ $contact->id }})">詳細</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $contacts->links() }}

@endsection
