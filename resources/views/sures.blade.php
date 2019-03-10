@extends('layouts.app')
@section('content')


    <h2>スレッド一覧</h2>
    @foreach($sures as $sure)
      <a href="resus/{{ $sure->id }}">{{ $sure->id }}:{{ $sure->sure_name }}:{{ $sure->created_at }}</a><br><br>
    @endforeach
    {{ $sures->links() }}

    <hr>

    <h2>スレッド作成</h2>
    <p>新しいスレッドを作るときはこちらでどうぞ</p>
    @include('errors')
    <form method="POST" action="{{ url('sure') }}">
      {{ csrf_field() }}
      <p>新しく作るスレッドのタイトル</p>
      <input type="text" name="sure_name">
      <input type="submit" value="作成">
    </form>

    <hr>

    <h2>掲示板検索</h2>
    <a href="/search">検索するときはこちらでどうぞ</a>

    <hr>

    <h2>ダウンロード</h2>
    <a href="/download">スレッドをダウンロードするときはこちらでどうぞ</a>

    <hr>

    <h2>お問い合わせ</h2>
    <a href="/contact">削除や修正依頼など、管理人にお問い合わせたいことはこちらからどうぞ。</a>

    <hr>

@endsection



    