@extends('layouts.app')
@section('content')

    <h2>お問い合わせの確認</h2>
    <p>下記の内容でよろしければ完了をクリックしてください。</p>
    <p>メールアドレス:{{ $email }}</p>
    <p>お問い合わせ内容:{!!  nl2br(e($message)) !!}</p>

    <form method="post" action="{{ url('contacted') }}">
      {{ csrf_field() }}
      <input type="hidden" name="email" value="{{ $email }}">
      <input type="hidden" name="message" value="{{ $message }}">
      <input type="submit" name="action" value="戻る">
      <input type="submit" name="action" value="完了">
    </form>

    <hr>

    <a href="/sures">スレッド一覧に戻る</a>

@endsection



    