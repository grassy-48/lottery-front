@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('content')
<div class="column">
<section class="section" id="menu">
  <h1 class="title"> ポイントをゲットする </h1>
  <hr>
  <div class="columns">
  <div class="column">
  @if (!empty($code))
  <form action="/store/check" method="post">
      <div class="field">
        <label class="label">メールアドレス（必須）</label>
        <p class="control has-icons-left has-icons-right">
          <input id="mail" name="mail" class="input is-rounded" type="email" placeholder="メールアドレス">
          <span class="icon is-small is-left">
            <i class="fa fa-envelope"></i>
          </span>
          <span class="icon is-small is-right">
            <i class="fa fa-warning"></i>
          </span>
        </p>
      </div>
	  <p>※必ず毎回同じメールアドレスを入力してください。メールアドレスを間違えるとポイントが加算されません。
      <div class="field">	
		<input type="hidden" name="code" value="{{$code}}">
		<input type="submit" class="button is-primary" value="ポイントをゲットする"> 
      </div>
  </form>
  @else
  <div class="column">
	  <p>ペーパーについているQRコードを読み込んでください。</p>
	  <p>読み込めない場合は、ご自分の端末のカメラアプリをご利用ください。</p> 
      <div class="buttons">
	  <input class="button is-rounded" type="button" value="カメラを起動する（スマホのみ）" onClick="capCamera();">
   	  <br>
      <video id="camera" width="640" height="480" autoplay="1" ></video>
  </div>
  @endif
  </div>
  </div>
</section>
</div>
@if (empty($code))
<script type="text/javascript">
function capCamera(){
  navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || window.navigator.mozGetUserMedia;
    window.URL = window.URL || window.webkitURL;

  var video = document.getElementById("camera");
  var localStream = null;
  navigator.getUserMedia({video: true, audio: false},
  function(stream) {
    console.log(stream);
    video.src = window.URL.createObjectURL(stream);
  },
  function(err) {
    console.log(err);
  }
  );
} 
</script>
@endif
@endsection