@extends('layouts.app')
@section('content')


    <h2>スレッド一覧</h2>
    @foreach($sures as $sure)
      <a href="resus/{{ $sure->id }}">{{ $sure->id }}:{{ $sure->sure_name }}:{{ $sure->created_at }}</a><br><br>
    @endforeach

    <hr>

    <h2>スレッド作成</h2>
    <p>新しいスレッドを作るときはこちらでどうぞ</p>
    <form method="POST" action="{{ url('sure') }}">
      {{ csrf_field() }}
      <p>新しく作るスレッドのタイトル</p>
      <input type="text" name="sure_name">
      <input type="submit" value="作成">
    </form>
    <hr>
@endsection



    