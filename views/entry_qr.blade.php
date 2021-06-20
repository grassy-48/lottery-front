@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('content')
<div class="column">
<section class="section" id="form">
<h1 class="title">
	登録が完了しました！
</h1>
<hr>
<div class="columns">
<div class="column">
      <article class="message is-dark">
        <div class="message-header">
          <p>
            QRコードはご自身でDLして、作成したペーパーにおつけください！
          </p>
        </div>
        <div class="message-body">
          ペーパー１種類につき１枚のQRコードをお使いください。６種以上のペーパーを作成予定の方は、主催までご連絡ください。<br>
          DL前にこのページを閉じてしまった場合は、再度同じメールアドレスでご登録ください。<br>
          <strong>※ペーパー作成後、必ずご自身のスマートフォンでQRコードが読み取り可能かご確認ください。</strong><br>
        </div>
      </article>
    </div>
</div>
<hr>
<div class="column">
    <nav class="panel">
      <p class="panel-heading"> {{$user['name']}} 様　専用QRコード </p>
@foreach ($code_img as $code)
    @if (!$loop->last)
    <div class="panel-block">
    <figure class="image is-128x128">
    <img src=" http://ymtk.m2.valueserver.jp/ymtk.xyz/lottery/img/qr_code/g2fevs3R74vXZq6v.png">
    <img src="{{$code['img']}}">
    </figure>
    </div>
    @endif
@endforeach
    </nav>
</div>
<div class="column">
<a class="button is-small" href="/"> TOPへもどる </a>
</div>
</div>
@endsection