@extends('layouts.app') 

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
    <h2>お問い合わせありがとうございました。</h2>
    <div class="form__button">
        <a href="{{ route('contacts.index') }}" class="btn btn-primary">HOME</a>
    </div>
</div>
@endsection
