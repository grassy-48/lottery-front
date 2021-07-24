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
            <a href="/entry" class="button is-rounded is-large">QRコードを発行する</a>
          </div>
        </div>
        @if (false) 
        <div class="column">
          <div class="buttons">
            <a href="/store" class="button is-rounded is-large">ポイントをためる</a>
          </div>
        </div>
        @endif
        @if (true) 
        <div class="column">
          <p>テスト終わったらイベント日の12時までボタン隠す</p>
          <div class="buttons">
            <a href="/draw" class="button is-rounded is-large">くじを引く</a>
          </div>
        </div>
        @endif 
      </div>
      <div class="column">
        <article class="message is-warning">
          <div class="message-header">一般参加の方へ </div>
          <div class="message-body">スマートフォンのカメラアプリでQRコードを読み込んで、ポイントゲット! </div>
        </article>
      </div>
    </div>
  </section>
</div>
@endsection