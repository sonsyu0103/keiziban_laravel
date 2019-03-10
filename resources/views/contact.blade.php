@extends('layouts.app')
@section('content')

    <h2>お問い合わせ</h2>
    <p>削除や修正依頼など、管理人にお問い合わせたいことはこちらからどうぞ。</p>
    @include('errors')
    <form method="POST" action="{{ url('contacting') }}">
      {{ csrf_field() }}
      <p>お問い合わせ内容</p>
      <textarea name="message" cols="50" rows="10">
        {{ old('message') }}
      </textarea>
      <input type="submit" value="送信">
    </form>

    <hr>

    <a href="/sures">スレッド一覧に戻る</a>

@endsection



    