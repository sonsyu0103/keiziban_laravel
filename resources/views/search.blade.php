@extends('layouts.app')
@section('content')


    <h2>検索結果一覧</h2>
    @isset($results)
    @foreach($results as $result)
      {{ $result->id }}:{{ $result->sure_name }}:{{ $result->name }}:{{ $result->created_at }}<br>
      {!! nl2br(e($resu->mess)) !!} <br><br>
      @if($result->image)
        <img src="{{ asset('storage/images/'.$result->image) }}"><br><br>
      @endif
    @endforeach
    @endisset

    <hr>

    <h2>掲示板検索</h2>
    <p>ここではスレッド名、メッセージ投稿者名、メッセージ内容の検索ができます</p>
    @include('errors')
    <form method="GET" action="{{ url('searched') }}">
      {{ csrf_field() }}
      <p>検索する文字列</p>
      <input type="text" name="search">
      <input type="submit" value="検索">
    </form>

    <hr>

    <a href="/sures">スレッド一覧に戻る</a>
    
@endsection



    