@extends('layouts.app')
@section('content')

    <!!-- スレッド名表示 -->
    @foreach($titles as $title)
      <h2>【{{ $title->id }}:{{ $title->sure_name }}スレッド】</h2>
    @endforeach

    <hr>

    <!!-- レス一覧表示 -->
    @foreach($resus as $resu)
      {{ $loop->iteration }}:{{ $resu->name }}:{{ $resu->created_at }}<br>
      {{ $resu->mess }}<br><br>
      @if($resu->image)
        <img src="{{ asset('storage/images/'.$resu->image) }}"><br><br>
      @endif
    @endforeach

    <hr>

    <p>このスレッドに投稿するときはこちらからどうぞ</p>
    <form method="POST" action="{{ url('resu') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
      <p>名前</p>
      <input type="text" name="name">
      <p>メッセージ</p>
      <textarea name="mess" row="10" cols="70"></textarea><br>
      <p>画像を選択してください</p>
      <input type="file" name="image">
      <input type="hidden" name="code" value="{{ $code }}">
      <input type="submit" value="投稿">
    </form>
    <hr>
@endsection



    