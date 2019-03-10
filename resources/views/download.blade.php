@extends('layouts.app')
@section('content')

<h2>ダウンロード</h2>

@isset($results)
<p>これらの一覧をダウンロードする場合は一覧の下にあるダウンロードをクリックしてください。</p>
<p>投稿者名:投稿時間:メッセージ</p>
@foreach($results as $result)
{{ $result->name }}:{{ $result->created_at }}:{!! nl2br(e($resu->mess)) !!}<br>
@endforeach<br>
<a href="{{ route('export.download',['keyword'=>$keyword]) }}">ダウンロード</a><br>
@endisset

<hr>

<p>ダウンロードしたいスレッドの番号を入力してください。</p>
@include('errors')
<form method="get" action="{{ url('downloading') }}">
  {{ csrf_field() }}
  <input type="text" name="keyword">
  <input type="submit" value="指定">
</form>

<hr>
    
<a href="/sures">スレッド一覧に戻る</a>

@endsection



    