@extends('layouts.app')
@section('content')


    <h2>会員情報修正</h2>
    @include('errors')
    @foreach($users as $user)
      会員ID:{{ $user->id }}<br>
    　<form method="POST" action="{{ url('editing') }}">
        {{ csrf_field() }}
        <p>新しい会員名を入力してください。</p>
        <input type="text" name="u_name" value="{{ $user->name }}">
        <div>新しいメールアドレスを入力してください。</div>
        <input type="text" name="email" value="{{ $user->email }}"><br>
        <p>新しいパスワードを入力してください。</p>
        <input type="password" name="pass">
        <p>新しいパスワードをもう一度入力してください。</p>
        <input type="password" name="pass_confirmation"><br><br>
			  <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK"><br><br>
      </form>        
    @endforeach

    <hr>

    <a href="/sures">スレッド一覧に戻
@endsection