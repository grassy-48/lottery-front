@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('title', 'くじシステムTOP')
@section('content')
<div class="column">
<section class="hero is-primary" id="menu">
<div class="column">
  <h1 class="title"> Menu </h1>
  <hr>
  <div class="columns">
    <div class="column">
      <div class="buttons">
        <a href="/entry" class="button is-rounded is-large">企画に参加する</a>
      </div>
    </div>
    @if (false)
    <div class="column">
      <div class="buttons">
        <a href="/store" class="button is-rounded is-large">ポイントをためる</a>
      </div>
    </div>
    @endif
    <div class="column">
      <div class="buttons">
        <a href="/draw" class="button is-rounded is-large">くじを引く</a>
      </div>
    </div>
  </div>
<div class="column">
    <p> QRコードを読み込んでポイントをゲットする場合は、スマートフォンのカメラアプリをご使用ください </p>
</div>
</div>
</section>
</div>
@endsection
