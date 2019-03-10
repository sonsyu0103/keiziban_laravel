@extends('layouts.app')
@section('content')


    <h2>マイページ</h2>
    @foreach($users as $user)
      会員ID:{{ $user->id }}<br>
      会員名：{{ $user->name }}<br>
      メールアドレス：{{ $user->email }}<br><br>
    @endforeach

    <a href="/edit">会員情報修正</a>

    <hr>
    
    <a href="/sures">スレッド一覧に戻る</a>
@endsection



    