@if(count($errors)>0)
  <strong>エラーが発生しました</strong><br>
  <ul>
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif    