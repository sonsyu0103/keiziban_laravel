@extends('layouts.app')
@section('content')



    <h2></h2>
    @foreach($ress as $res)
    @php
    $count=1;
    $count++;
    @endphp
    :{{ $res->name }}:{{ $res->created_at }}<br>
    {{ $res->mess }}<br>
    @if($res->hasFile('image'))
    {
      $file=$request->file('image');
    }
    @endif
    @endforeach
    <hr>
    <p>メッセージを書くときはこちらからどうぞ</p>
    <form method="POST" action="{{ url('res') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
      <p>名前</p>
      <input type="text" name="name">
      <p>メッセージ</p>
      <textarea name="mess" row="10" cols="70"></textarea><br>
      <p>画像を選択してください</p>
      <input type="file" name="image">
      <input type="hidden" name="code" Value="{{ $code }}">
      <input type="submit" value="投稿">
    </form>
    <hr>
@endsection



    